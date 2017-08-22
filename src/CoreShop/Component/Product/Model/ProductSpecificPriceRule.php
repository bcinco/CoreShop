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

namespace CoreShop\Component\Product\Model;

use CoreShop\Component\Resource\Model\ToggleableTrait;
use CoreShop\Component\Rule\Model\RuleTrait;

class ProductSpecificPriceRule implements ProductSpecificPriceRuleInterface
{
    use RuleTrait;
    use ToggleableTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $product;

    /**
     * @var bool
     */
    protected $inherit = false;

    /**
     * @var int
     */
    protected $priority = 0;

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
    public function getProduct(): ?int
    {
        return $this->product;
    }

    /**
     * {@inheritdoc}
     */
    public function setProduct(int $product): ProductSpecificPriceRuleInterface
    {
        $this->product = $product;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getInherit(): ?bool
    {
        return $this->inherit;
    }

    /**
     * {@inheritdoc}
     */
    public function setInherit(bool $inherit): ProductSpecificPriceRuleInterface
    {
        $this->inherit = $inherit;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * {@inheritdoc}
     */
    public function setPriority(int $priority): ProductSpecificPriceRuleInterface
    {
        $this->priority = $priority;

        return $this;
    }
}
