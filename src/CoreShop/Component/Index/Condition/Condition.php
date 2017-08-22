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

class Condition implements ConditionInterface
{
    /**
     * @var string
     */
    protected $type = '';

    /**
     * @var string
     */
    protected $fieldName;

    /**
     * @var mixed
     */
    protected $values = null;

    /**
     * Condition constructor.
     *
     * @param string $fieldName
     * @param string $type
     * @param mixed  $values
     */
    public function __construct($fieldName, $type, $values)
    {
        $this->fieldName = $fieldName;
        $this->type = $type;
        $this->values = $values;
    }

    /**
     * IN Condition (in).
     *
     * @param $fieldName
     * @param $array
     *
     * @return ConditionInterface
     */
    public static function in($fieldName, $array): ConditionInterface
    {
        return new self($fieldName, 'in', $array);
    }

    /**
     * Range Condition (>=, <=).
     *
     * @param $fieldName
     * @param $fromRange
     * @param $toRange
     *
     * @return ConditionInterface
     */
    public static function range($fieldName, $fromRange, $toRange): ConditionInterface
    {
        return new self($fieldName, 'range', ['from' => $fromRange, 'to' => $toRange]);
    }

    /**
     * Concat Conditions with "AND" or "OR".
     *
     * @param $fieldName
     * @param Condition[] $conditions
     * @param string      $operator   ("AND", "OR")
     *
     * @return ConditionInterface
     */
    public static function concat($fieldName, $conditions, $operator): ConditionInterface
    {
        return new self($fieldName, 'concat', ['operator' => $operator, 'conditions' => $conditions]);
    }

    /**
     * Like Condition (%).
     *
     * @param $fieldName
     * @param $value
     * @param $patternPosition ("left", "right", "both")
     *
     * @return ConditionInterface
     */
    public static function like($fieldName, $value, $patternPosition): ConditionInterface
    {
        return new self($fieldName, 'like', ['value' => $value, 'pattern' => $patternPosition]);
    }

    /**
     * Match Condition (=).
     *
     * @param $fieldName
     * @param $value
     *
     * @return ConditionInterface
     */
    public static function match($fieldName, $value): ConditionInterface
    {
        return static::compare($fieldName, $value, '=');
    }

    /**
     * Match Condition (=).
     *
     * @param $fieldName
     * @param $value
     *
     * @return ConditionInterface
     */
    public static function notMatch($fieldName, $value): ConditionInterface
    {
        return static::compare($fieldName, $value, '!=');
    }

    /**
     * Lower Than Condition (<).
     *
     * @param $fieldName
     * @param $value
     *
     * @return ConditionInterface
     */
    public static function lt($fieldName, $value): ConditionInterface
    {
        return static::compare($fieldName, $value, '<');
    }

    /**
     * Lower Than Equal Condition (<=).
     *
     * @param $fieldName
     * @param $value
     *
     * @return ConditionInterface
     */
    public static function lte($fieldName, $value): ConditionInterface
    {
        return static::compare($fieldName, $value, '<=');
    }

    /**
     * Greater Than Condition (>).
     *
     * @param $fieldName
     * @param $value
     *
     * @return ConditionInterface
     */
    public static function gt($fieldName, $value): ConditionInterface
    {
        return static::compare($fieldName, $value, '>');
    }

    /**
     * Greater Than Equal Condition (<=).
     *
     * @param $fieldName
     * @param $value
     *
     * @return ConditionInterface
     */
    public static function gte($fieldName, $value): ConditionInterface
    {
        return static::compare($fieldName, $value, '>=');
    }

    /**
     * Compare Condition ($operator).
     *
     * @param $fieldName
     * @param $value
     * @param $operator
     *
     * @return ConditionInterface
     */
    public static function compare($fieldName, $value, $operator): ConditionInterface
    {
        return new self($fieldName, 'compare', ['value' => $value, 'operator' => $operator]);
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * {@inheritdoc}
     */
    public function setValues($values): ConditionInterface
    {
        $this->values = $values;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    /**
     * {@inheritdoc}
     */
    public function setFieldName($fieldName): ConditionInterface
    {
        $this->fieldName = $fieldName;

        return $this;
    }
}
