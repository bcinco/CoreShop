<?php

namespace CoreShop\Bridge\Ecommerce\CartManager;

use CoreShop\Bridge\Ecommerce\Model\Cart;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartPriceModificator\ICartPriceModificator;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\ICart;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\ICartPriceCalculator;

class CartPriceCalculator implements ICartPriceCalculator 
{
    /**
     * @var Cart
     */
    private $cart;
    
    public function __construct($config, ICart $cart)
    {
        $this->cart = $cart;
    }

    public function calculate()
    {
        return $this->cart->getTotal(true);
    }

    public function reset()
    {

    }

    public function getSubTotal()
    {
        return $this->cart->getSubtotal(true);
    }

    public function getPriceModifications()
    {
        return $this->cart->getDiscount(true);
    }

    public function getGrandTotal()
    {
        return $this->cart->getTotal(true);
    }

    public function addModificator(ICartPriceModificator $modificator)
    {
        //Not supported, use CoreShop PriceRules
        return false;
    }

    public function getModificators()
    {
        //Not supported, use CoreShop PriceRules
        return false;
    }

    public function removeModificator(ICartPriceModificator $modificator)
    {
        //Not supported, use CoreShop PriceRules
        return false;
    }

}