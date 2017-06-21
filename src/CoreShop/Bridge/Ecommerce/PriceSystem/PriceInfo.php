<?php

namespace CoreShop\Bridge\Ecommerce\PriceSystem;

use CoreShop\Bridge\Ecommerce\Model\Product;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\ICheckoutable;
use Pimcore\Bundle\EcommerceFrameworkBundle\PriceSystem\IPriceInfo;
use Pimcore\Bundle\EcommerceFrameworkBundle\PriceSystem\IPriceSystem;

class PriceInfo implements IPriceInfo
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var IPriceSystem
     */
    private $priceSystem;

    /**
     * PriceInfo constructor.
     * @param ICheckoutable $product
     * @param int $quantity
     * @param $priceSystem
     */
    public function __construct(ICheckoutable $product, $quantity, $priceSystem)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->priceSystem = $priceSystem;
    }

    public function getPrice()
    {
        return $this->product->getPrice(true);
    }

    public function getTotalPrice()
    {
        return $this->product->getPrice(true) * $this->quantity;
    }

    public function isMinPrice()
    {
        return true; //But whay?
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setPriceSystem($priceSystem)
    {
        $this->priceSystem = $priceSystem;
    }

    public function setProduct(\Pimcore\Bundle\EcommerceFrameworkBundle\Model\ICheckoutable $product)
    {
        $this->product = $product;
    }

    public function getProduct()
    {
        return $this->product;
    }
}