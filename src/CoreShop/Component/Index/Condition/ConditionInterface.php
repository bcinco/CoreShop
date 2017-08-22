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

namespace CoreShop\Component\Index\Condition;

interface ConditionInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param string $type
     *
     * @return static
     */
    public function setType($type): ConditionInterface;

    /**
     * @return array
     */
    public function getValues(): array;

    /**
     * @param array $values
     *
     * @return static
     */
    public function setValues($values): ConditionInterface;

    /**
     * @return string
     */
    public function getFieldName(): string;

    /**
     * @param string $fieldName
     *
     * @return static
     */
    public function setFieldName($fieldName): ConditionInterface;
}
