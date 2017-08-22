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

class IndexColumn extends AbstractResource implements IndexColumnInterface
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
    public $objectKey;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $objectType;

    /**
     * @var string
     */
    public $getter;

    /**
     * @var array
     */
    public $getterConfig = [];

    /**
     * @var string
     */
    public $dataType;

    /**
     * @var string
     */
    public $interpreter;

    /**
     * @var array
     */
    public $interpreterConfig = [];

    /**
     * @var string
     */
    public $columnType;

    /**
     * @var array
     */
    public $configuration = [];

    /**
     * @var IndexInterface
     */
    public $index;

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getId());
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
    public function getObjectKey(): ?string
    {
        return $this->objectKey;
    }

    /**
     * {@inheritdoc}
     */
    public function setObjectKey(string $objectKey): IndexColumnInterface
    {
        $this->objectKey = $objectKey;

        return $this;
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
    public function setType(string $type): IndexColumnInterface
    {
        $this->type = $type;

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
    public function setName(string $name): IndexColumnInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getObjectType(): ?string
    {
        return $this->objectType;
    }

    /**
     * {@inheritdoc}
     */
    public function setObjectType(string $objectType): IndexColumnInterface
    {
        $this->objectType = $objectType;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetter(): ?string
    {
        return $this->getter;
    }

    /**
     * {@inheritdoc}
     */
    public function setGetter(string $getter): IndexColumnInterface
    {
        $this->getter = $getter;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetterConfig(): array
    {
        return $this->getterConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function setGetterConfig($getterConfig): IndexColumnInterface
    {
        $this->getterConfig = $getterConfig;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDataType(): ?string
    {
        return $this->dataType;
    }

    /**
     * {@inheritdoc}
     */
    public function setDataType(string $dataType): IndexColumnInterface
    {
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getInterpreter(): ?string
    {
        return $this->interpreter;
    }

    /**
     * {@inheritdoc}
     */
    public function setInterpreter(string $interpreter): IndexColumnInterface
    {
        $this->interpreter = $interpreter;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getInterpreterConfig(): array
    {
        return $this->interpreterConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function setInterpreterConfig($interpreterConfig): IndexColumnInterface
    {
        $this->interpreterConfig = $interpreterConfig;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumnType(): ?string
    {
        return $this->columnType;
    }

    /**
     * {@inheritdoc}
     */
    public function setColumnType(string $columnType): IndexColumnInterface
    {
        $this->columnType = $columnType;

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
    public function setConfiguration($configuration): IndexColumnInterface
    {
        $this->configuration = $configuration;

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
    public function setIndex(IndexInterface $index): IndexColumnInterface
    {
        $this->index = $index;

        return $this;
    }
}
