<?php

namespace CoreShop\Bridge\Ecommerce\Model;

use CoreShop\Component\Core\Model\Cart as BaseCart;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\ICart;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\ICheckoutable;

class Cart extends BaseCart implements ICart 
{
    public function isEmpty()
    {
        return count($this->getItems()) === 0;
    }

    public function isCartReadOnly()
    {
        return false;
    }

    public function getItem($itemKey)
    {
        foreach ($this->getItems() as $item) {
            if ($item->getKey() === $itemKey) {
                return $item;
            }
        }
        
        return false;
    }

    public function getGiftItems()
    {
        return false;
    }

    public function getGiftItem($itemKey)
    {
        return false;
    }

    public function updateItem($itemKey, ICheckoutable $product, $count, $replace = false, $params = [], $subProducts = [], $comment = null)
    {
        // TODO: Implement updateItem() method.
    }

    public function updateItemCount($itemKey, $count)
    {
        // TODO: Implement updateItemCount() method.
    }

    public function addGiftItem(ICheckoutable $product, $count, $itemKey = null, $replace = false, $params = [], $subProducts = [], $comment = null)
    {
        // TODO: Implement addGiftItem() method.
    }

    public function updateGiftItem($itemKey, ICheckoutable $product, $count, $replace = false, $params = [], $subProducts = [], $comment = null)
    {
        // TODO: Implement updateGiftItem() method.
    }

    public function clear()
    {
        // TODO: Implement clear() method.
    }

    public function getItemAmount($countSubItems = false)
    {
        // TODO: Implement getItemAmount() method.
    }

    public function getItemCount($countSubItems = false)
    {
        // TODO: Implement getItemCount() method.
    }

    public function getRecentlyAddedItems($count)
    {
        // TODO: Implement getRecentlyAddedItems() method.
    }

    public function getPriceCalculator()
    {
        // TODO: Implement getPriceCalculator() method.
    }

    public function setCheckoutData($key, $data)
    {
        // TODO: Implement setCheckoutData() method.
    }

    public function getCheckoutData($key)
    {
        // TODO: Implement getCheckoutData() method.
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function setName($name)
    {
        // TODO: Implement setName() method.
    }

    public function getIsBookable()
    {
        // TODO: Implement getIsBookable() method.
    }

    public function sortItems(callable $value_compare_func)
    {
        // TODO: Implement sortItems() method.
    }

    public static function getAllCartsForUser($userId)
    {
        // TODO: Implement getAllCartsForUser() method.
    }

    public function addVoucherToken($token)
    {
        // TODO: Implement addVoucherToken() method.
    }

    public function removeVoucherToken($token)
    {
        // TODO: Implement removeVoucherToken() method.
    }

    public function getVoucherTokenCodes()
    {
        // TODO: Implement getVoucherTokenCodes() method.
    }

    public function isVoucherErrorCode($errorCode)
    {
        // TODO: Implement isVoucherErrorCode() method.
    }

}