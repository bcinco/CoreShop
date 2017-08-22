<?php

namespace CoreShop\Bundle\TrackingBundle\Model;

class PromotionData extends AbstractData
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $creative;

    /**
     * @var string
     */
    public $position;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCreative(): string
    {
        return $this->creative;
    }

    /**
     * @param string $creative
     */
    public function setCreative(string $creative): void
    {
        $this->creative = $creative;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }
}
