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

use CoreShop\Component\Resource\Model\SetValuesTrait;
use CoreShop\Component\Resource\Model\TimestampableTrait;

class CartPriceRuleVoucherCode implements CartPriceRuleVoucherCodeInterface
{
    use TimestampableTrait;
    use SetValuesTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var bool
     */
    protected $used;

    /**
     * @var int
     */
    protected $uses;

    /**
     * @var CartPriceRuleInterface
     */
    protected $cartPriceRule;

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function setCode($code): CartPriceRuleVoucherCodeInterface
    {
        $this->code = $code;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsed(): bool
    {
        return $this->used;
    }

    /**
     * {@inheritdoc}
     */
    public function setUsed($used): CartPriceRuleVoucherCodeInterface
    {
        $this->used = $used;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUses(): int
    {
        return $this->uses;
    }

    /**
     * {@inheritdoc}
     */
    public function setUses($uses): CartPriceRuleVoucherCodeInterface
    {
        $this->uses = $uses;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCartPriceRule(): CartPriceRuleInterface
    {
        return $this->cartPriceRule;
    }

    /**
     * {@inheritdoc}
     */
    public function setCartPriceRule(?CartPriceRuleInterface $cartPriceRule): CartPriceRuleVoucherCodeInterface
    {
        $this->cartPriceRule = $cartPriceRule;

        return $this;
    }
}
