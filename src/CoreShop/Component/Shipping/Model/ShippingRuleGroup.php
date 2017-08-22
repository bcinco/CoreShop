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

class ShippingRuleGroup implements ShippingRuleGroupInterface
{
    use TimestampableTrait;
    use SetValuesTrait;

    /**
     * @var int
     */
    private $id;

    /**
     * @var CarrierInterface
     */
    private $carrier;

    /**
     * @var int
     */
    private $priority;

    /**
     * @var ShippingRuleInterface
     */
    private $shippingRule;

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
    public function getCarrier(): ?CarrierInterface
    {
        return $this->carrier;
    }

    /**
     * {@inheritdoc}
     */
    public function setCarrier(CarrierInterface $carrier): ShippingRuleGroupInterface
    {
        $this->carrier = $carrier;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * {@inheritdoc}
     */
    public function setPriority(int $priority): ShippingRuleGroupInterface
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingRule(): ?ShippingRuleInterface
    {
        return $this->shippingRule;
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingRule(ShippingRuleInterface $shippingRule): ShippingRuleGroupInterface
    {
        $this->shippingRule = $shippingRule;

        return $this;
    }

}
