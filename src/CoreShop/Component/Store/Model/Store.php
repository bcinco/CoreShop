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

namespace CoreShop\Component\Store\Model;

use CoreShop\Component\Currency\Model\CurrencyAwareTrait;
use CoreShop\Component\Resource\Model\AbstractResource;
use CoreShop\Component\Resource\Model\TimestampableTrait;

class Store extends AbstractResource implements StoreInterface
{
    use TimestampableTrait;
    use CurrencyAwareTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $template = 'standard';

    /**
     * @var bool
     */
    protected $isDefault = false;

    /**
     * @var int
     */
    protected $siteId = 0;

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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
    public function setName(string $name): StoreInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    /**
     * {@inheritdoc}
     */
    public function setTemplate(string $template): StoreInterface
    {
        $this->template = $template;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsDefault(bool $isDefault): StoreInterface
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSiteId(): ?int
    {
        return $this->siteId;
    }

    /**
     * {@inheritdoc}
     */
    public function setSiteId(?int $siteId): StoreInterface
    {
        $this->siteId = $siteId;

        return $this;
    }
}
