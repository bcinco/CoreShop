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

namespace CoreShop\Component\Core\Model;

use CoreShop\Component\Address\Model\StateInterface;
use CoreShop\Component\Taxation\Model\TaxRuleInterface as BaseTaxRuleInterface;

interface TaxRuleInterface extends BaseTaxRuleInterface
{
    /**
     * @return CountryInterface
     */
    public function getCountry(): ?CountryInterface;

    /**
     * @param CountryInterface|null $country
     *
     * @return static
     */
    public function setCountry(?CountryInterface $country): TaxRuleInterface;

    /**
     * @return StateInterface
     */
    public function getState(): ?StateInterface;

    /**
     * @param StateInterface|null $state
     *
     * @return static
     */
    public function setState(?StateInterface $state): TaxRuleInterface;
}
