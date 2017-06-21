<?php

namespace CoreShop\Bridge\Ecommerce;

use CoreShop\Bridge\Ecommerce\CartManager\CartPriceCalculator;
use CoreShop\Bridge\Ecommerce\Model\Product;
use CoreShop\Component\Core\Model\CartInterface;
use CoreShop\Component\Order\Cart\CartModifierInterface;
use CoreShop\Component\Order\Manager\CartManagerInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\ICart;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\ICartManager;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\ICheckoutable;

final class CartManager implements ICartManager
{
    /**
     * @return CartManagerInterface
     */
    private function getCSCartManager()
    {
        return \Pimcore::getContainer()->get("coreshop.cart.manager");
    }

    /**
     * @return CartModifierInterface
     */
    private function getCSCartModifier()
    {
        return \Pimcore::getContainer()->get('coreshop.cart.modifier');
    }

    /**
     * {@inheritdoc}
     */
    public function getCartClassName()
    {
        return "?";
    }

    /**
     * {@inheritdoc}
     */
    public function addToCart(ICheckoutable $product, $count, $key = null, $itemKey = null, $replace = false, $params = [], $subProducts = [], $comment = null)
    {
        $cart = $this->getCSCartManager()->getCart();

        if ($product instanceof Product) {
            $item = $this->getCSCartModifier()->addCartItem($cart, $product, $count);

            $item->setKey($itemKey);
            $item->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeFromCart($itemKey, $key = null)
    {
        $cart = $this->getCSCartManager()->getCart();

        if ($cart instanceof CartInterface) {
            foreach ($cart->getItems() as $item) {
                if ($item->getKey() === $itemKey) {
                    $this->getCSCartModifier()->removeCartItem($cart, $item);
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getCart($key = null)
    {
        return $this->getCSCartManager()->getCart();
    }

    /**
     * {@inheritdoc}
     */
    public function getCartByName($name)
    {
        return $this->getCSCartManager()->getCart();
    }

    /**
     * {@inheritdoc}
     */
    public function getCarts()
    {
        return [$this->getCSCartManager()->getCart()];
    }

    /**
     * {@inheritdoc}
     */
    public function clearCart($key = null)
    {
        $cart = $this->getCSCartManager()->getCart();
        foreach ($cart->getItems() as $item) {
            $this->getCSCartModifier()->removeCartItem($cart, $item);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function createCart($param)
    {
        return $this->getCSCartManager()->createCart($param['name']);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteCart($key = null)
    {
        $cart = $this->getCSCartManager()->getCart();
        $cart->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function getCartPriceCalculator(ICart $cart)
    {
        return new CartPriceCalculator([], $cart);
    }

    /**
     * {@inheritdoc}
     */
    public function getCartPriceCalcuator(ICart $cart)
    {
        return $this->getCartPriceCalculator($cart);
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        //Nothing to do here :/
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        //Nothing to do here :/
    }
}