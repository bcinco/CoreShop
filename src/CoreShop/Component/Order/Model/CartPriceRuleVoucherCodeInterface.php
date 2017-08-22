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

namespace CoreShop\Component\Order\Model;

use CoreShop\Component\Resource\Model\ResourceInterface;
use CoreShop\Component\Resource\Model\TimestampableInterface;

interface CartPriceRuleVoucherCodeInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @param string $code
     *
     * @return static
     */
    public function setCode($code): CartPriceRuleVoucherCodeInterface;

    /**
     * @return bool
     */
    public function getUsed(): bool;

    /**
     * @param bool $used
     *
     * @return static
     */
    public function setUsed($used): CartPriceRuleVoucherCodeInterface;

    /**
     * @return int
     */
    public function getUses(): int;

    /**
     * @param int $uses
     *
     * @return static
     */
    public function setUses($uses): CartPriceRuleVoucherCodeInterface;

    /**
     * @return CartPriceRuleInterface
     */
    public function getCartPriceRule();

    /**
     * @param CartPriceRuleInterface|null $cartPriceRule
     *
     * @return static
     */
    public function setCartPriceRule(?CartPriceRuleInterface $cartPriceRule): CartPriceRuleVoucherCodeInterface;
}
