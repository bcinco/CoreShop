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

namespace CoreShop\Component\Taxation\Model;

use CoreShop\Component\Resource\Model\ResourceInterface;
use CoreShop\Component\Resource\Model\TimestampableInterface;

interface TaxRuleInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * @return int
     */
    public function getBehavior(): ?int;

    /**
     * @param int $behavior
     *
     * @return static
     */
    public function setBehavior(int $behavior): TaxRuleInterface;

    /**
     * @return TaxRuleGroupInterface
     */
    public function getTaxRuleGroup(): ?TaxRuleGroupInterface;

    /**
     * @param TaxRuleGroupInterface $taxRuleGroup
     *
     * @return static
     */
    public function setTaxRuleGroup(TaxRuleGroupInterface $taxRuleGroup): TaxRuleInterface;

    /**
     * @return TaxRateInterface
     */
    public function getTaxRate(): ?TaxRateInterface;

    /**
     * @param TaxRateInterface $tax
     *
     * @return static
     */
    public function setTaxRate(TaxRateInterface $tax): TaxRuleInterface;
}
