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
use CoreShop\Component\Resource\Model\ToggleableInterface;
use Doctrine\Common\Collections\Collection;

interface TaxRuleGroupInterface extends ResourceInterface, TimestampableInterface, ToggleableInterface
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
    public function setName(string $name): TaxRuleGroupInterface;

    /**
     * @return Collection|TaxRuleInterface[]
     */
    public function getTaxRules(): Collection;

    /**
     * @return bool
     */
    public function hasTaxRules(): bool;

    /**
     * @param TaxRuleInterface $taxRule
     *
     * @return static
     */
    public function addTaxRule(TaxRuleInterface $taxRule): TaxRuleGroupInterface;

    /**
     * @param TaxRuleInterface $taxRule
     *
     * @return static
     */
    public function removeTaxRule(TaxRuleInterface $taxRule): TaxRuleGroupInterface;

    /**
     * @param TaxRuleInterface $taxRule
     *
     * @return bool
     */
    public function hasTaxRule(TaxRuleInterface $taxRule): bool;
}
