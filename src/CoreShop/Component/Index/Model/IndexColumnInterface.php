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

interface IndexColumnInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * Field Type Integer for Index.
     */
    const FIELD_TYPE_INTEGER = 'INTEGER';

    /**
     * Field Type Double for Index.
     */
    const FIELD_TYPE_DOUBLE = 'DOUBLE';

    /**
     * Field Type String for Index.
     */
    const FIELD_TYPE_STRING = 'STRING';

    /**
     * Field Type Text for Index.
     */
    const FIELD_TYPE_TEXT = 'TEXT';

    /**
     * Field Type Boolean for Index.
     */
    const FIELD_TYPE_BOOLEAN = 'BOOLEAN';

    /**
     * Field Type Date for Index.
     */
    const FIELD_TYPE_DATE = 'DATE';

    /**
     * @return IndexInterface
     */
    public function getIndex(): ?IndexInterface;

    /**
     * @param IndexInterface $index
     *
     * @return static
     */
    public function setIndex(IndexInterface $index): IndexColumnInterface;

    /**
     * @return string
     */
    public function getObjectKey(): ?string;

    /**
     * @param string $key
     *
     * @return static
     */
    public function setObjectKey(string $key): IndexColumnInterface;

    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @param string $name
     *
     * @return static
     */
    public function setName(string $name): IndexColumnInterface;

    /**
     * @return string
     */
    public function getType(): ?string;

    /**
     * @param string $type
     *
     * @return static
     */
    public function setType(string $type): IndexColumnInterface;

    /**
     * @return string
     */
    public function getObjectType(): ?string;

    /**
     * @param string $objectType
     *
     * @return static
     */
    public function setObjectType(string $objectType): IndexColumnInterface;

    /**
     * @return string
     */
    public function getGetter(): ?string;

    /**
     * @param string $getter
     *
     * @return static
     */
    public function setGetter(string $getter): IndexColumnInterface;

    /**
     * @return array
     */
    public function getGetterConfig(): array;

    /**
     * @param array $getterConfig
     *
     * @return static
     */
    public function setGetterConfig($getterConfig): IndexColumnInterface;

    /**
     * @return string
     */
    public function getDataType(): ?string;

    /**
     * @param string $dataType
     *
     * @return static
     */
    public function setDataType(string $dataType): IndexColumnInterface;

    /**
     * @return string
     */
    public function getInterpreter(): ?string;

    /**
     * @param string $interpreter
     *
     * @return static
     */
    public function setInterpreter(string $interpreter): IndexColumnInterface;

    /**
     * @return array
     */
    public function getInterpreterConfig(): array;

    /**
     * @param array $interpreterConfig
     *
     * @return static
     */
    public function setInterpreterConfig($interpreterConfig): IndexColumnInterface;

    /**
     * @return string
     */
    public function getColumnType(): ?string;

    /**
     * @param string $columnType
     *
     * @return static
     */
    public function setColumnType(string $columnType): IndexColumnInterface;

    /**
     * @return array
     */
    public function getConfiguration(): array;

    /**
     * @param array $configuration
     *
     * @return static
     */
    public function setConfiguration($configuration): IndexColumnInterface;
}
