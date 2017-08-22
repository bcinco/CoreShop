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
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Filter extends AbstractResource implements FilterInterface
{
    use TimestampableTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $resultsPerPage;

    /**
     * @var string
     */
    protected $orderDirection = 'ASC';

    /**
     * @var string
     */
    protected $orderKey = 'o_id';

    /**
     * @var IndexInterface
     */
    protected $index;

    /**
     * @var Collection|array
     */
    protected $preConditions;

    /**
     * @var Collection|array
     */
    protected $conditions;

    public function __construct()
    {
        $this->preConditions = new ArrayCollection();
        $this->conditions = new ArrayCollection();
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name): FilterInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getResultsPerPage(): ?int
    {
        return $this->resultsPerPage;
    }

    /**
     * {@inheritdoc}
     */
    public function setResultsPerPage(int $resultsPerPage): FilterInterface
    {
        $this->resultsPerPage = $resultsPerPage;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderDirection(): ?string
    {
        return $this->orderDirection;
    }

    /**
     * {@inheritdoc}
     */
    public function setOrderDirection(string $orderDirection): FilterInterface
    {
        $this->orderDirection = $orderDirection;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderKey(): ?string
    {
        return $this->orderKey;
    }

    /**
     * {@inheritdoc}
     */
    public function setOrderKey(string $orderKey): FilterInterface
    {
        $this->orderKey = $orderKey;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIndex(): ?IndexInterface
    {
        return $this->index;
    }

    /**
     * {@inheritdoc}
     */
    public function setIndex(IndexInterface $index): FilterInterface
    {
        $this->index = $index;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPreConditions(): Collection
    {
        return $this->preConditions;
    }

    /**
     * {@inheritdoc}
     */
    public function hasPreConditions(): bool
    {
        return !$this->preConditions->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function addPreCondition(FilterConditionInterface $preCondition): FilterInterface
    {
        if (!$this->hasPreCondition($preCondition)) {
            $this->preConditions->add($preCondition);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removePreCondition(FilterConditionInterface $preCondition): FilterInterface
    {
        if ($this->hasPreCondition($preCondition)) {
            $this->preConditions->removeElement($preCondition);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasPreCondition(FilterConditionInterface $preCondition): bool
    {
        return $this->preConditions->contains($preCondition);
    }

    /**
     * {@inheritdoc}
     */
    public function getConditions(): Collection
    {
        return $this->conditions;
    }

    /**
     * {@inheritdoc}
     */
    public function hasConditions(): bool
    {
        return !$this->conditions->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function addCondition(FilterConditionInterface $condition): FilterInterface
    {
        if (!$this->hasCondition($condition)) {
            $this->conditions->add($condition);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeCondition(FilterConditionInterface $condition): FilterInterface
    {
        if ($this->hasCondition($condition)) {
            $this->conditions->removeElement($condition);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCondition(FilterConditionInterface $condition): bool
    {
        return $this->conditions->contains($condition);
    }
}
