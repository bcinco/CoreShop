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

interface FilterConditionInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * @return string
     */
    public function getType(): ?string;

    /**
     * @param string $type
     *
     * @return static
     */
    public function setType(string $type): FilterConditionInterface;

    /**
     * @return string
     */
    public function getField(): ?string;

    /**
     * @param string $field
     *
     * @return static
     */
    public function setField(string $field): FilterConditionInterface;

    /**
     * @return string
     */
    public function getLabel(): ?string;

    /**
     * @param string $label
     *
     * @return static
     */
    public function setLabel(string $label): FilterConditionInterface;

    /**
     * @return int
     */
    public function getQuantityUnit(): ?int;

    /**
     * @param int $quantityUnit
     *
     * @return static
     */
    public function setQuantityUnit(int $quantityUnit): FilterConditionInterface;

    /**
     * @return array
     */
    public function getConfiguration(): array;

    /**
     * @param array $configuration
     *
     * @return static
     */
    public function setConfiguration($configuration): FilterConditionInterface;

    /**
     * @return FilterInterface
     */
    public function getFilter(): ?FilterInterface;

    /**
     * @param FilterInterface $filter
     *
     * @return static
     */
    public function setFilter(FilterInterface $filter): FilterConditionInterface;
}
