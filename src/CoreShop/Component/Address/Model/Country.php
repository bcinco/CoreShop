<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2017 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
*/

namespace CoreShop\Component\Address\Model;

use CoreShop\Component\Resource\Model\AbstractResource;
use CoreShop\Component\Resource\Model\TimestampableTrait;
use CoreShop\Component\Resource\Model\ToggleableTrait;
use CoreShop\Component\Resource\Model\TranslatableTrait;
use Doctrine\Common\Collections\Collection;

class Country extends AbstractResource implements CountryInterface
{
    use ToggleableTrait;
    use TimestampableTrait;
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $isoCode;

    /**
     * @var ZoneInterface|null
     */
    protected $zone;

    /**
     * @var Collection|StateInterface[]
     */
    protected $states;

    /**
     * @var string
     */
    protected $addressFormat = '';

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsoCode(): ?string
    {
        return $this->isoCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsoCode(string $isoCode): CountryInterface
    {
        $this->isoCode = $isoCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(?string $language = null): ?string
    {
        return $this->getTranslation($language)->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name, ?string $language = null): CountryInterface
    {
        $this->getTranslation($language, false)->setName($name);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddressFormat(): ?string
    {
        return $this->addressFormat;
    }

    /**
     * {@inheritdoc}
     */
    public function setAddressFormat($addressFormat): CountryInterface
    {
        $this->addressFormat = $addressFormat;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getZone(): ?ZoneInterface
    {
        return $this->zone;
    }

    /**
     * {@inheritdoc}
     */
    public function setZone(?ZoneInterface $zone): CountryInterface
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getZoneName(): ?string
    {
        return $this->getZone() instanceof ZoneInterface ? $this->getZone()->getName() : '';
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation(): CountryTranslationInterface
    {
        return new CountryTranslation();
    }
}
