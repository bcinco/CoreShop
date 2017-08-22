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
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Zone extends AbstractResource implements ZoneInterface
{
    use ToggleableTrait;
    use TimestampableTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Collection|CountryInterface[]
     */
    protected $countries;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s (%s)', $this->getName(), $this->getId());
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name): ZoneInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCountries(): bool
    {
        return !$this->countries->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function addCountry(CountryInterface $country): ZoneInterface
    {
        if (!$this->hasCountry($country)) {
            $this->countries->add($country);
            $country->setZone($this);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeCountry(CountryInterface $country): ZoneInterface
    {
        if ($this->hasCountry($country)) {
            $this->countries->removeElement($country);
            $country->setZone(null);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCountry(CountryInterface $country): bool
    {
        return $this->countries->contains($country);
    }
}
