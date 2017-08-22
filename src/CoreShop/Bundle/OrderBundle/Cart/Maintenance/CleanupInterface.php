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

namespace CoreShop\Bundle\OrderBundle\Cart\Maintenance;

interface CleanupInterface
{
    /**
     * Cleanup expired carts
     */
    public function cleanup();

    /**
     * @return int
     */
    public function getExpirationDays(): int;

    /**
     * @param int $expirationDays
     *
     * @return static
     */
    public function setExpirationDays(int $expirationDays): CleanupInterface;

    /**
     * @return boolean
     */
    public function getCleanupAnonymous(): bool;

    /**
     * @param boolean $cleanupAnonymous
     *
     * @return static
     */
    public function setCleanupAnonymous(bool $cleanupAnonymous): CleanupInterface;

    /**
     * @return boolean
     */
    public function getCleanupUser(): bool;

    /**
     * @param boolean $cleanupUser
     *
     * @return static
     */
    public function setCleanupUser(bool $cleanupUser): CleanupInterface;
}