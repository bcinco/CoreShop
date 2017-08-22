<?php

namespace CoreShop\Component\Currency\Model;

use CoreShop\Component\Resource\Model\ResourceInterface;

interface ExchangeRateInterface extends ResourceInterface
{
    /**
     * @return int
     */
    public function getExchangeRate(): ?int;

    /**
     * @param int $exchangeRate
     *
     * @return ExchangeRateInterface
     */
    public function setExchangeRate(int $exchangeRate): ExchangeRateInterface;

    /**
     * @return CurrencyInterface
     */
    public function getFromCurrency(): ?CurrencyInterface;

    /**
     * @param CurrencyInterface $currency
     *
     * @return static
     */
    public function setFromCurrency(CurrencyInterface $currency): ExchangeRateInterface;

    /**
     * @return CurrencyInterface
     */
    public function getToCurrency(): ?CurrencyInterface;

    /**
     * @param CurrencyInterface $currency
     *
     * @return static
     */
    public function setToCurrency(CurrencyInterface $currency): ExchangeRateInterface;
}
