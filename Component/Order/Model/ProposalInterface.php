<?php

namespace CoreShop\Component\Order\Model;

use CoreShop\Component\Currency\Model\CurrencyInterface;
use CoreShop\Component\Resource\Pimcore\Model\PimcoreModelInterface;
use CoreShop\Component\Store\Model\StoreInterface;

interface ProposalInterface extends PimcoreModelInterface {

    /**
     * @return CurrencyInterface
     */
    public function getCurrency();

    /**
     * @param CurrencyInterface $currency
     * @return static
     */
    public function setCurrency($currency);

    /**
     * @return array
     */
    public function getItems();

    /**
     * @return bool
     */
    public function hasItems();

    /**
     * @param $item
     */
    public function addItem($item);

    /**
     * @param $item
     */
    public function removeItem($item);

    /**
     * @param $item
     * @return bool
     */
    public function hasItem($item);

    /**
     * @return StoreInterface
     */
    public function getStore();

    /**
     * @param StoreInterface $store
     * @return static
     */
    public function setStore(StoreInterface $store);

    /**
     * @return mixed
     */
    public function getCustomer();

    /**
     * @param $customer
     * @return static
     */
    public function setCustomer($customer);

    /**
     * @return mixed
     */
    public function getShippingAddress();

    /**
     * @param $shippingAddress
     * @return static
     */
    public function setShippingAddress($shippingAddress);

    /**
     * @return mixed
     */
    public function getInvoiceAddress();

    /**
     * @param $invoiceAddress
     * @return static
     */
    public function setInvoiceAddress($invoiceAddress);
}