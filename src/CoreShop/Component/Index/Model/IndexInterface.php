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

interface IndexInterface extends ResourceInterface, TimestampableInterface
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
    public function setName(string $name): IndexInterface;

    /**
     * @return string
     */
    public function getWorker(): ?string;

    /**
     * @param string $worker
     *
     * @return static
     */
    public function setWorker(string $worker): IndexInterface;

    /**
     * @return string
     */
    public function getClass(): ?string;

    /**
     * @param string $class
     *
     * @return static
     */
    public function setClass(string $class): IndexInterface;

    /**
     * @return Collection|IndexColumnInterface[]
     */
    public function getColumns(): Collection;

    /**
     * @return bool
     */
    public function hasColumns(): bool;

    /**
     * @param IndexColumnInterface $column
     *
     * @return static
     */
    public function addColumn(IndexColumnInterface $column): IndexInterface;

    /**
     * @param IndexColumnInterface $column
     *
     * @return static
     */
    public function removeColumn(IndexColumnInterface $column): IndexInterface;

    /**
     * @param IndexColumnInterface $column
     *
     * @return bool
     */
    public function hasColumn(IndexColumnInterface $column): bool;

    /**
     * @return array
     */
    public function getConfiguration(): array;

    /**
     * @param $configuration
     *
     * @return static
     */
    public function setConfiguration($configuration): IndexInterface;
}
