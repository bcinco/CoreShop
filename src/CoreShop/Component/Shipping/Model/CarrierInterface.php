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
use Doctrine\Common\Collections\Collection;

interface CarrierInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * Range Behaviour Deactivate.
     */
    const RANGE_BEHAVIOUR_DEACTIVATE = 'deactivate';

    /**
     * Range Behaviour Largest.
     */
    const RANGE_BEHAVIOUR_LARGEST = 'largest';

    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @param string $name
     *
     * @return static
     */
    public function setName(string $name): CarrierInterface;

    /**
     * @return string
     */
    public function getLabel(): ?string;

    /**
     * @param string $label
     *
     * @return static
     */
    public function setLabel(string $label): CarrierInterface;

    /**
     * @return string
     */
    public function getTrackingUrl(): ?string;

    /**
     * @param string $trackingUrl
     *
     * @return static
     */
    public function setTrackingUrl(string $trackingUrl): CarrierInterface;

    /**
     * @return bool
     */
    public function getIsFree(): ?bool;

    /**
     * @param bool $isFree
     *
     * @return static
     */
    public function setIsFree(bool $isFree): CarrierInterface;

    /**
     * @return string
     */
    public function getRangeBehaviour(): ?string;

    /**
     * @param string $rangeBehaviour
     *
     * @return static
     */
    public function setRangeBehaviour(string $rangeBehaviour): CarrierInterface;

    /**
     * @return Collection|ShippingRuleGroupInterface[]
     */
    public function getShippingRules(): Collection;

    /**
     * @return bool
     */
    public function hasShippingRules(): bool;

    /**
     * @param ShippingRuleGroupInterface $shippingRuleGroup
     *
     * @return static
     */
    public function addShippingRule(ShippingRuleGroupInterface $shippingRuleGroup): CarrierInterface;

    /**
     * @param ShippingRuleGroupInterface $shippingRuleGroup
     *
     * @return static
     */
    public function removeShippingRule(ShippingRuleGroupInterface $shippingRuleGroup): CarrierInterface;

    /**
     * @param ShippingRuleGroupInterface $shippingRuleGroup
     *
     * @return bool
     */
    public function hasShippingRule(ShippingRuleGroupInterface $shippingRuleGroup): bool;
}
