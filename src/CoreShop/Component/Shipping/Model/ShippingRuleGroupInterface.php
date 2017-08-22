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

use CoreShop\Component\Resource\Model\ResourceInterface;
use CoreShop\Component\Resource\Model\TimestampableInterface;

interface ShippingRuleGroupInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * @return CarrierInterface
     */
    public function getCarrier(): ?CarrierInterface;

    /**
     * @param CarrierInterface|null $carrier
     *
     * @return static
     */
    public function setCarrier(CarrierInterface $carrier): ShippingRuleGroupInterface;

    /**
     * @return int
     */
    public function getPriority(): ?int;

    /**
     * @param int $priority
     *
     * @return static
     */
    public function setPriority(int $priority): ShippingRuleGroupInterface;

    /**
     * @return ShippingRuleInterface
     */
    public function getShippingRule(): ?ShippingRuleInterface;

    /**
     * @param ShippingRuleInterface $shippingRule
     *
     * @return static
     */
    public function setShippingRule(ShippingRuleInterface $shippingRule): ShippingRuleGroupInterface;
}
