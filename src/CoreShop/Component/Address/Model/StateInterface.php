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

namespace CoreShop\Component\Address\Model;

use CoreShop\Component\Resource\Model\ResourceInterface;
use CoreShop\Component\Resource\Model\TimestampableInterface;
use CoreShop\Component\Resource\Model\ToggleableInterface;
use CoreShop\Component\Resource\Model\TranslatableInterface;

interface StateInterface extends ResourceInterface, TranslatableInterface, TimestampableInterface, ToggleableInterface
{
    /**
     * @return string
     */
    public function getIsoCode(): ?string;

    /**
     * @param $isoCode
     *
     * @return static
     */
    public function setIsoCode(string $isoCode): StateInterface;

    /**
     * @param $language
     *
     * @return string
     */
    public function getName(?string $language = null): ?string;

    /**
     * @param $name
     * @param $language
     *
     * @return StateInterface
     */
    public function setName(string $name, ?string $language = null): StateInterface;

    /**
     * @return CountryInterface|null
     */
    public function getCountry(): ?CountryInterface;

    /**
     * @param CountryInterface $country
     */
    public function setCountry(CountryInterface $country): StateInterface;

    /**
     * @return string
     */
    public function getCountryName(): ?string;
}
