<?php

namespace CoreShop\Component\Order\Model;

use CoreShop\Component\Resource\Model\SetValuesTrait;

class CartPriceRuleVoucherCode implements CartPriceRuleVoucherCodeInterface
{
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
     * @var \DateTime
     */
    protected $creationDate;

    /**
     * @var boolean
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * {@inheritdoc}
     */
    public function setUsed($used)
    {
        $this->used = $used;
    }

    /**
     * {@inheritdoc}
     */
    public function getUses()
    {
        return $this->uses;
    }

    /**
     * {@inheritdoc}
     */
    public function setUses($uses)
    {
        $this->uses = $uses;
    }

    /**
     * {@inheritdoc}
     */
    public function getCartPriceRule()
    {
        return $this->cartPriceRule;
    }

    /**
     * {@inheritdoc}
     */
    public function setCartPriceRule($cartPriceRule)
    {
        $this->cartPriceRule = $cartPriceRule;
    }
}