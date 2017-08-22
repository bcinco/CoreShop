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

class Index extends AbstractResource implements IndexInterface
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
     * @var string
     */
    protected $class = '';

    /**
     * @var string
     */
    protected $worker = '';

    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * @var Collection|IndexColumnInterface[]
     */
    protected $columns;

    public function __construct()
    {
        $this->columns = new ArrayCollection();
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
    public function getWorker(): ?string
    {
        return $this->worker;
    }

    /**
     * {@inheritdoc}
     */
    public function setWorker(string $worker): IndexInterface
    {
        $this->worker = $worker;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getClass(): ?string
    {
        return $this->class;
    }

    /**
     * {@inheritdoc}
     */
    public function setClass(string $class): IndexInterface
    {
        $this->class = $class;

        return $this;
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
    public function setName(string $name): IndexInterface
    {
        $this->name = $name;

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
    public function setConfiguration($configuration): IndexInterface
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumns(): Collection
    {
        return $this->columns;
    }

    /**
     * {@inheritdoc}
     */
    public function hasColumns(): bool
    {
        return !$this->columns->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function addColumn(IndexColumnInterface $column): IndexInterface
    {
        if (!$this->hasColumn($column)) {
            $this->columns->add($column);
            $column->setIndex($this);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeColumn(IndexColumnInterface $column): IndexInterface
    {
        if ($this->hasColumn($column)) {
            $this->columns->removeElement($column);
            $column->setIndex(null);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasColumn(IndexColumnInterface $column): bool
    {
        return $this->columns->contains($column);
    }
}
