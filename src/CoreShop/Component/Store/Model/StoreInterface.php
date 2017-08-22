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

namespace CoreShop\Component\Store\Model;

use CoreShop\Component\Currency\Model\CurrencyAwareInterface;
use CoreShop\Component\Resource\Model\ResourceInterface;
use CoreShop\Component\Resource\Model\TimestampableInterface;

interface StoreInterface extends ResourceInterface, TimestampableInterface, CurrencyAwareInterface
{
    /**
     * @return string
     */
    public function getName(): ?string;

    /**
     * @param string $name
     *
     * @return static
     */
    public function setName(string $name): StoreInterface;

    /**
     * @return string
     */
    public function getTemplate(): ?string;

    /**
     * @param string $template
     * @return static
     */
    public function setTemplate(string $template): StoreInterface;

    /**
     * @return bool
     */
    public function getIsDefault(): ?bool;

    /**
     * @param bool $isDefault
     *
     * @return static
     */
    public function setIsDefault(bool $isDefault): StoreInterface;

    /**
     * @return int
     */
    public function getSiteId(): ?int;

    /**
     * @param int $siteId
     *
     * @return static
     */
    public function setSiteId(?int $siteId): StoreInterface;
}
