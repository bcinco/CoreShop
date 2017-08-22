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

use CoreShop\Component\Resource\Model\ResourceInterface;
use CoreShop\Component\Resource\Model\TimestampableInterface;
use Doctrine\Common\Collections\Collection;

interface FilterInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @param $name
     *
     * @return static
     */
    public function setName(string $name): FilterInterface;

    /**
     * @return int
     */
    public function getResultsPerPage(): ?int;

    /**
     * @param int $resultsPerPage
     *
     * @return static
     */
    public function setResultsPerPage(int $resultsPerPage): FilterInterface;

    /**
     * @return string
     */
    public function getOrderDirection(): ?string;

    /**
     * @param string $orderDirection
     *
     * @return static
     */
    public function setOrderDirection(string $orderDirection): FilterInterface;

    /**
     * @return string
     */
    public function getOrderKey(): ?string;

    /**
     * @param string $orderKey
     *
     * @return static
     */
    public function setOrderKey(string $orderKey): FilterInterface;

    /**
     * @return Collection|FilterConditionInterface[]
     */
    public function getPreConditions(): Collection;

    /**
     * @return bool
     */
    public function hasPreConditions(): bool;

    /**
     * @param FilterConditionInterface $preCondition
     *
     * @return static
     */
    public function addPreCondition(FilterConditionInterface $preCondition): FilterInterface;

    /**
     * @param FilterConditionInterface $preCondition
     *
     * @return static
     */
    public function removePreCondition(FilterConditionInterface $preCondition): FilterInterface;

    /**
     * @param FilterConditionInterface $preCondition
     *
     * @return bool
     */
    public function hasPreCondition(FilterConditionInterface $preCondition): bool;

    /**
     * @return Collection|array
     */
    public function getConditions(): Collection;

    /**
     * @return bool
     */
    public function hasConditions(): bool;

    /**
     * @param FilterConditionInterface $condition
     *
     * @return static
     */
    public function addCondition(FilterConditionInterface $condition): FilterInterface;

    /**
     * @param FilterConditionInterface $condition
     *
     * @return static
     */
    public function removeCondition(FilterConditionInterface $condition): FilterInterface;

    /**
     * @param FilterConditionInterface $condition
     *
     * @return bool
     */
    public function hasCondition(FilterConditionInterface $condition): bool;

    /**
     * @return IndexInterface
     */
    public function getIndex(): ?IndexInterface;

    /**
     * @param IndexInterface $index
     *
     * @return static
     */
    public function setIndex(IndexInterface $index): FilterInterface;
}
