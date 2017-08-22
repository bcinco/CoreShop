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

namespace CoreShop\Component\Rule\Model;


use CoreShop\Component\Resource\Model\SetValuesTrait;
use CoreShop\Component\Resource\Model\TimestampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

trait RuleTrait
{
    use TimestampableTrait;
    use SetValuesTrait;

    /**
     * @var string
     */
    public $name;

    /**
     * @var Collection|RuleInterface[]
     */
    protected $conditions;

    /**
     * @var Collection|ActionInterface[]
     */
    protected $actions;

    public function __construct()
    {
        $this->conditions = new ArrayCollection();
        $this->actions = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s (%s)', $this->getName(), $this->getId());
    }

    /**
     * @return int
     */
    public abstract function getId();

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name): RuleInterface
    {
        $this->name = $name;

        return $this;
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
    public function hasCondition(ConditionInterface $condition): bool
    {
        return $this->conditions->contains($condition);
    }

    /**
     * {@inheritdoc}
     */
    public function addCondition(ConditionInterface $condition): RuleInterface
    {
        if (!$this->hasCondition($condition)) {
            $this->conditions->add($condition);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeCondition(ConditionInterface $condition): RuleInterface
    {
        $this->conditions->removeElement($condition);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    /**
     * {@inheritdoc}
     */
    public function hasActions(): bool
    {
        return !$this->actions->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function hasAction(ActionInterface $action): bool
    {
        return $this->actions->contains($action);
    }

    /**
     * {@inheritdoc}
     */
    public function addAction(ActionInterface $action): RuleInterface
    {
        if (!$this->hasAction($action)) {
            $this->actions->add($action);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeAction(ActionInterface $action): RuleInterface
    {
        $this->actions->removeElement($action);

        return $this;
    }
}
