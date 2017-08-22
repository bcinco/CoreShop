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

interface ProductSpecificPriceRuleInterface extends PriceRuleInterface
{
    /**
     * @return bool
     */
    public function getInherit(): ?bool;

    /**
     * @param bool $inherit
     *
     * @return static
     */
    public function setInherit(bool $inherit): ProductSpecificPriceRuleInterface;

    /**
     * @return int
     */
    public function getPriority(): ?int;

    /**
     * @param int $priority
     *
     * @return static
     */
    public function setPriority(int $priority): ProductSpecificPriceRuleInterface;

    /**
     * @return int
     */
    public function getProduct(): ?int;

    /**
     * @param int $id
     *
     * @return static
     */
    public function setProduct(int $id): ProductSpecificPriceRuleInterface;
}
