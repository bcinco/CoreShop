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

use Carbon\Carbon;
use CoreShop\Component\Order\Repository\CartRepositoryInterface;

final class Cleanup implements CleanupInterface
{
    /**
     * @var CartRepositoryInterface
     */
    private $cartRepository;

    /**
     * @var int
     */
    private $expirationDays;

    /**
     * @var boolean
     */
    private $cleanupAnonymous;

    /**
     * @var boolean
     */
    private $cleanupUser;

    /**
     * @param CartRepositoryInterface $cartRepository
     * @param int $expirationDays
     * @param bool $cleanupAnonymous
     * @param bool $cleanupUser
     */
    public function __construct(CartRepositoryInterface $cartRepository, $expirationDays, $cleanupAnonymous, $cleanupUser)
    {
        $this->cartRepository = $cartRepository;
        $this->expirationDays = $expirationDays;
        $this->cleanupAnonymous = $cleanupAnonymous;
        $this->cleanupUser = $cleanupUser;
    }

    /**
     * {@inheritdoc}
     */
    public function cleanup(): void
    {
        $list = $this->cartRepository->getList();

        $conditions = [];
        $groupCondition = [];
        $params = [];

        $daysTimestamp = Carbon::now();
        $daysTimestamp->subDay($this->getExpirationDays());

        $conditions[] = 'o_creationDate < ?';
        $params[] = $daysTimestamp->getTimestamp();

        //Never delete carts with a order
        $conditions[] = 'order__id IS NULL';

        if ($this->getCleanupAnonymous()) {
            $groupCondition[] = 'customer__id IS NULL';
        }
        if ($this->getCleanupUser()) {
            $groupCondition[] = 'customer__id IS NOT NULL';
        }

        $bind = ' AND ';
        $groupBind = ' AND ';

        $sql = implode($bind, $conditions);

        if (count($groupCondition) > 1) {
            $groupBind = ' OR ';
        }

        $sql .= ' AND (' . implode($groupBind, $groupCondition) . ') ';

        $list->setCondition($sql, $params);
        $carts = $list->load();

        if (is_array($carts)) {
            foreach ($carts as $cart) {
                $cart->delete();
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getExpirationDays(): int
    {
        return $this->expirationDays;
    }

    /**
     * {@inheritdoc}
     */
    public function setExpirationDays(int $expirationDays): CleanupInterface
    {
        $this->expirationDays = $expirationDays;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCleanupAnonymous(): bool
    {
        return $this->cleanupAnonymous;
    }

    /**
     * {@inheritdoc}
     */
    public function setCleanupAnonymous(bool $cleanupAnonymous): CleanupInterface
    {
        $this->cleanupAnonymous = $cleanupAnonymous;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCleanupUser(): bool
    {
        return $this->cleanupUser;
    }

    /**
     * {@inheritdoc}
     */
    public function setCleanupUser(bool $cleanupUser): CleanupInterface
    {
        $this->cleanupUser = $cleanupUser;

        return $this;
    }
}