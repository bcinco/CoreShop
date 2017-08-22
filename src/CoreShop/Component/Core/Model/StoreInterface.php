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

use CoreShop\Component\Store\Model\StoreInterface as BaseStoreInterface;
use Doctrine\Common\Collections\Collection;

interface StoreInterface extends BaseStoreInterface
{
    /**
     * @return CountryInterface
     */
    public function getBaseCountry(): ?CountryInterface;

    /**
     * @param CountryInterface $baseCurrency
     *
     * @return static
     */
    public function setBaseCountry(CountryInterface $baseCurrency): StoreInterface;

    /**
     * @return Collection|ConfigurationInterface[]
     */
    public function getConfigurations(): Collection;

    /**
     * @return bool
     */
    public function hasConfigurations(): bool;

    /**
     * @param ConfigurationInterface $configuration
     *
     * @return static
     */
    public function addConfiguration(ConfigurationInterface $configuration): StoreInterface;

    /**
     * @param ConfigurationInterface $configuration
     *
     * @return static
     */
    public function removeConfiguration(ConfigurationInterface $configuration): StoreInterface;

    /**
     * @param ConfigurationInterface $configuration
     *
     * @return bool
     */
    public function hasConfiguration(ConfigurationInterface $configuration): bool;
}
