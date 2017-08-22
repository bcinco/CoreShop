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

namespace CoreShop\Component\Shipping\Model;

use CoreShop\Component\Resource\Model\SetValuesTrait;
use CoreShop\Component\Resource\Model\TimestampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Carrier implements CarrierInterface
{
    use TimestampableTrait;
    use SetValuesTrait;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $trackingUrl;

    /**
     * @var bool
     */
    private $isFree = false;

    /**
     * @var int
     */
    private $rangeBehaviour = self::RANGE_BEHAVIOUR_DEACTIVATE;

    /**
     * @var Collection|ShippingRuleGroupInterface[]
     */
    protected $shippingRules;

    public function __construct()
    {
        $this->shippingRules = new ArrayCollection();
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
    public function setName(string $name): CarrierInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * {@inheritdoc}
     */
    public function setLabel(string $label): CarrierInterface
    {
        $this->label = $label;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function setTrackingUrl(string $trackingUrl): CarrierInterface
    {
        $this->trackingUrl = $trackingUrl;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsFree(): ?bool
    {
        return $this->isFree;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsFree(bool $isFree): CarrierInterface
    {
        $this->isFree = $isFree;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRangeBehaviour(): ?string
    {
        return $this->rangeBehaviour;
    }

    /**
     * {@inheritdoc}
     */
    public function setRangeBehaviour(string $rangeBehaviour): CarrierInterface
    {
        $this->rangeBehaviour = $rangeBehaviour;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingRules(): Collection
    {
        return $this->shippingRules;
    }

    /**
     * {@inheritdoc}
     */
    public function hasShippingRules(): bool
    {
        return !$this->shippingRules->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function addShippingRule(ShippingRuleGroupInterface $shippingRuleGroup): CarrierInterface
    {
        if (!$this->hasShippingRule($shippingRuleGroup)) {
            $this->shippingRules->add($shippingRuleGroup);

            $shippingRuleGroup->setCarrier($this);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeShippingRule(ShippingRuleGroupInterface $shippingRuleGroup): CarrierInterface
    {
        if ($this->hasShippingRule($shippingRuleGroup)) {
            $this->shippingRules->removeElement($shippingRuleGroup);
            $shippingRuleGroup->setCarrier(null);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasShippingRule(ShippingRuleGroupInterface $shippingRuleGroup): bool
    {
        return $this->shippingRules->contains($shippingRuleGroup);
    }
}
