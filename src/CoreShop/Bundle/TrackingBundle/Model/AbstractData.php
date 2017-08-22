<?php

namespace CoreShop\Bundle\TrackingBundle\Model;

class AbstractData
{
    /**
     * @var string
     */
    public $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }
}
