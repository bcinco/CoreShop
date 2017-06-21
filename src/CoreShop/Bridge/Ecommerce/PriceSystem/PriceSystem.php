<?php

namespace CoreShop\Bridge\Ecommerce\PriceSystem;

use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartPriceModificator\ICartPriceModificator;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\ICheckoutable;
use Pimcore\Bundle\EcommerceFrameworkBundle\PriceSystem\IPriceSystem;
use Symfony\Component\Intl\Exception\NotImplementedException;

class PriceSystem implements IPriceSystem
{
    public function getPriceInfo(ICheckoutable $abstractProduct, $quantityScale = null, $products = null)
    {
        return new \CoreShop\Bridge\Ecommerce\PriceSystem\PriceInfo($abstractProduct, $quantityScale, $this);
    }

    public function filterProductIds($productIds, $fromPrice, $toPrice, $order, $offset, $limit)
    {
        throw new NotImplementedException("not supported");
    }

    public function getTaxClassForProduct(ICheckoutable $product)
    {
        throw new NotImplementedException("not supported");
    }

    public function getTaxClassForPriceModification(ICartPriceModificator $modificator)
    {
        throw new NotImplementedException("not supported");
    }

}