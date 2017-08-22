<?php

namespace CoreShop\Bundle\TrackingBundle\Model;

class ActionData extends AbstractData
{
    /**
     * @var string
     */
    public $affiliation;

    /**
     * @var float
     */
    public $revenue;

    /**
     * @var float
     */
    public $tax;

    /**
     * @var float
     */
    public $shipping;

    /**
     * @var string
     */
    public $coupon;

    /**
     * @var string
     */
    public $list;

    /**
     * @var int
     */
    public $step;

    /**
     * @var string
     */
    public $option;

    /**
     * @return string
     */
    public function getAffiliation(): string
    {
        return $this->affiliation;
    }

    /**
     * @param string $affiliation
     */
    public function setAffiliation(string $affiliation): void
    {
        $this->affiliation = $affiliation;
    }

    /**
     * @return float
     */
    public function getRevenue(): float
    {
        return $this->revenue;
    }

    /**
     * @param float $revenue
     */
    public function setRevenue(float $revenue): void
    {
        $this->revenue = $revenue;
    }

    /**
     * @return float
     */
    public function getTax(): float
    {
        return $this->tax;
    }

    /**
     * @param float $tax
     */
    public function setTax(float $tax): void
    {
        $this->tax = $tax;
    }

    /**
     * @return float
     */
    public function getShipping(): float
    {
        return $this->shipping;
    }

    /**
     * @param float $shipping
     */
    public function setShipping(float $shipping): void
    {
        $this->shipping = $shipping;
    }

    /**
     * @return string
     */
    public function getCoupon(): string
    {
        return $this->coupon;
    }

    /**
     * @param string $coupon
     */
    public function setCoupon(string $coupon): void
    {
        $this->coupon = $coupon;
    }

    /**
     * @return string
     */
    public function getList(): string
    {
        return $this->list;
    }

    /**
     * @param string $list
     */
    public function setList(string $list): void
    {
        $this->list = $list;
    }

    /**
     * @return int
     */
    public function getStep(): int
    {
        return $this->step;
    }

    /**
     * @param int $step
     */
    public function setStep(int $step): void
    {
        $this->step = $step;
    }

    /**
     * @return string
     */
    public function getOption(): string
    {
        return $this->option;
    }

    /**
     * @param string $option
     */
    public function setOption(string $option): void
    {
        $this->option = $option;
    }
}
