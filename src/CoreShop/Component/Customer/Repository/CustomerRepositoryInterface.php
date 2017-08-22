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

namespace CoreShop\Component\Customer\Repository;

use CoreShop\Component\Customer\Model\CustomerInterface;
use CoreShop\Component\Resource\Repository\PimcoreRepositoryInterface;

interface CustomerRepositoryInterface extends PimcoreRepositoryInterface
{
    /**
     * Find customer by reset token
     *
     * @param $resetToken
     * @return null|CustomerInterface
     */
    public function findByResetToken($resetToken): ?CustomerInterface;

    /**
     * Find Customer by email.
     *
     * @param $email
     * @param $isGuest
     *
     * @return null|CustomerInterface
     */
    public function findUniqueByEmail($email, $isGuest): ?CustomerInterface;

    /**
     * Find Guest Customer by Email.
     *
     * @param $email
     *
     * @return null|CustomerInterface
     */
    public function findGuestByEmail($email): ?CustomerInterface;

    /**
     * Find Customer by Email.
     *
     * @param $email
     *
     * @return null|CustomerInterface
     */
    public function findCustomerByEmail($email): ?CustomerInterface;
}
