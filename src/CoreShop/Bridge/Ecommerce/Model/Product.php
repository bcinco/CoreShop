<?php

namespace CoreShop\Bridge\Ecommerce\Model;

use CoreShop\Component\Core\Model\Product as BaseProduct;
use Pimcore\Bundle\EcommerceFrameworkBundle\Factory;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\ICheckoutable;

class Product extends BaseProduct implements ICheckoutable
{
    public function getOSName()
    {
        return $this->getName();
    }

    public function getOSProductNumber()
    {
        return $this->getEan();
    }

    public function getPriceSystemName()
    {
        return 'coreshop';
    }

    public function getAvailabilitySystemName()
    {
        return 'coreshop';
    }

    public function getOSIsBookable($quantityScale = 1)
    {
        //Not Supported in CoreShop
        return false;
    }

    public function getPriceSystemImplementation()
    {
        return Factory::getInstance()->getPriceSystem($this->getPriceSystemName());
    }

    public function getAvailabilitySystemImplementation()
    {
        //Not Supported in CoreShop
        return false;
    }

    public function getOSPrice($quantityScale = 1)
    {
        return $this->getPrice(true) * $quantityScale;
    }

    public function getOSPriceInfo($quantityScale = 1)
    {
        return $this->getPriceSystemImplementation()->getPriceInfo($this, $quantityScale, null);
    }

    public function getOSAvailabilityInfo($quantity = null)
    {
        return $this->getAvailabilitySystemImplementation()->getAvailabilityInfo($this, $quantity);
    }
}