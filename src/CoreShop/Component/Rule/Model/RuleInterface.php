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

use CoreShop\Component\Resource\Model\ResourceInterface;
use CoreShop\Component\Resource\Model\TimestampableInterface;
use Doctrine\Common\Collections\Collection;

interface RuleInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @param string $name
     *
     * @return RuleInterface
     */
    public function setName(string $name): RuleInterface;

    /**
     * @return Collection|ConditionInterface[]
     */
    public function getConditions(): Collection;

    /**
     * @return bool
     */
    public function hasConditions(): bool;

    /**
     * @param ConditionInterface $conditions
     *
     * @return bool
     */
    public function hasCondition(ConditionInterface $conditions): bool;

    /**
     * @param ConditionInterface $conditions
     *
     * @return static
     */
    public function addCondition(ConditionInterface $conditions): RuleInterface;

    /**
     * @param ConditionInterface $conditions
     *
     * @return static
     */
    public function removeCondition(ConditionInterface $conditions): RuleInterface;

    /**
     * @return Collection|ActionInterface[]
     */
    public function getActions(): Collection;

    /**
     * @return bool
     */
    public function hasActions(): bool;

    /**
     * @param ActionInterface $action
     *
     * @return bool
     */
    public function hasAction(ActionInterface $action): bool;

    /**
     * @param ActionInterface $action
     *
     * @return static
     */
    public function addAction(ActionInterface $action): RuleInterface;

    /**
     * @param ActionInterface $action
     *
     * @return static
     */
    public function removeAction(ActionInterface $action): RuleInterface;
}
