<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2017 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
*/

namespace CoreShop\Component\Index\Model;

use CoreShop\Component\Resource\Model\AbstractResource;
use CoreShop\Component\Resource\Model\TimestampableTrait;

class FilterCondition extends AbstractResource implements FilterConditionInterface
{
    use TimestampableTrait;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $field;

    /**
     * @var string
     */
    public $label;

    /**
     * @var int
     */
    public $quantityUnit;

    /**
     * @var array
     */
    public $configuration;

    /**
     * @var FilterInterface
     */
    public $filter;

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
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType(string $type): FilterConditionInterface
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * {@inheritdoc}
     */
    public function setField(string $field): FilterConditionInterface
    {
        $this->field = $field;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * {@inheritdoc}
     */
    public function setLabel(string $label): FilterConditionInterface
    {
        $this->label = $label;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuantityUnit(): ?int
    {
        return $this->quantityUnit;
    }

    /**
     * {@inheritdoc}
     */
    public function setQuantityUnit(int $quantityUnit): FilterConditionInterface
    {
        $this->quantityUnit = $quantityUnit;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    /**
     * {@inheritdoc}
     */
    public function setConfiguration($configuration): FilterConditionInterface
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilter(): ?FilterInterface
    {
        return $this->filter;
    }

    /**
     * {@inheritdoc}
     */
    public function setFilter(FilterInterface $filter): FilterConditionInterface
    {
        $this->filter = $filter;

        return $this;
    }
}
