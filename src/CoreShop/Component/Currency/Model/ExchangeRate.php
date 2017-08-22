<?php

namespace CoreShop\Component\Currency\Model;

use CoreShop\Component\Resource\Model\SetValuesTrait;
use CoreShop\Component\Resource\Model\TimestampableTrait;

class ExchangeRate implements ExchangeRateInterface
{
    use SetValuesTrait;
    use TimestampableTrait;

    /**
     * @var mixed
     */
    protected $id;

    /**
     * @var float
     */
    protected $exchangeRate;

    /**
     * @var CurrencyInterface
     */
    protected $fromCurrency;

    /**
     * @var CurrencyInterface
     */
    protected $toCurrency;

    public function __construct()
    {
        $this->creationDate = new \DateTime();
    }

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
    public function getExchangeRate(): ?int
    {
        return $this->exchangeRate;
    }

    /**
     * {@inheritdoc}
     */
    public function setExchangeRate(int $exchangeRate): ExchangeRateInterface
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFromCurrency(): ?CurrencyInterface
    {
        return $this->fromCurrency;
    }

    /**
     * {@inheritdoc}
     */
    public function setFromCurrency(CurrencyInterface $fromCurrency): ExchangeRateInterface
    {
        $this->fromCurrency = $fromCurrency;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getToCurrency(): ?CurrencyInterface
    {
        return $this->toCurrency;
    }

    /**
     * {@inheritdoc}
     */
    public function setToCurrency(CurrencyInterface $toCurrency): ExchangeRateInterface
    {
        $this->toCurrency = $toCurrency;

        return $this;
    }
}
