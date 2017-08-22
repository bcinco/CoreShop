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
use CoreShop\Component\Resource\Model\TranslatableInterface;

interface TaxRateInterface extends ResourceInterface, TranslatableInterface, TimestampableInterface, ToggleableInterface
{
    /**
     * @param $language
     *
     * @return string
     */
    public function getName(?string $language = null): ?string;

    /**
     * @param string $name
     * @param string|null $language
     *
     * @return static
     */
    public function setName(string $name, ?string $language = null): TaxRateInterface;

    /**
     * @return float
     */
    public function getRate(): ?float;

    /**
     * @param float $rate
     *
     * @return static
     */
    public function setRate(float $rate): TaxRateInterface;
}
