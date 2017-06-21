<?php

namespace CoreShop\Bridge\Ecommerce\Model;

use CoreShop\Component\Core\Model\CartItem as BaseCartItem;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\ICart;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\ICartItem;

class CartItem extends BaseCartItem implements ICartItem
{
    /**
     * {@inheritdoc}
     */
    public function getCount()
    {
        return $this->getQuantity();
    }

    /**
     * {@inheritdoc}
     */
    public function getItemKey()
    {
        return $this->getKey();
    }

    /**
     * {@inheritdoc}
     */
    public function setCount($count)
    {
        return $this->setQuantity($count);
    }

    /**
     * {@inheritdoc}
     */
    public function setCart(ICart $cart)
    {
        return $this->setCart($cart);
    }

    /**
     * {@inheritdoc}
     */
    public function getSubItems()
    {
        //Not supported in CoreShop
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function setSubItems($subItems)
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public function getPrice()
    {
        return $this->getPrice();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalPrice()
    {
        return $this->getPrice();
    }

    /**
     * {@inheritdoc}
     */
    public function getPriceInfo()
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public function setComment($comment)
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public function getComment()
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public function getSetEntries()
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public function getAvailabilityInfo()
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public static function getByCartIdItemKey($cartId, $itemKey, $parentKey = '')
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public static function removeAllFromCart($cartId)
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public function setAddedDate(\DateTime $date = null)
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public function getAddedDate()
    {
        return $this->getCreationDate();
    }

    /**
     * {@inheritdoc}
     */
    public function getAddedDateTimestamp()
    {
        return $this->getCreationDate();
    }

    /**
     * {@inheritdoc}
     */
    public function setAddedDateTimestamp($time)
    {
        //Not supported in CoreShop
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getProduct()->getName();
    }
}