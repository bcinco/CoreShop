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

namespace CoreShop\Component\Payment\Model;

use CoreShop\Component\Currency\Model\CurrencyInterface;
use CoreShop\Component\Resource\Model\ResourceInterface;
use CoreShop\Component\Resource\Model\TimestampableInterface;

interface PaymentInterface extends \Payum\Core\Model\PaymentInterface, ResourceInterface, TimestampableInterface
{
    const STATE_NEW = 'new';
    const STATE_PROCESSING = 'processing';
    const STATE_COMPLETED = 'completed';
    const STATE_FAILED = 'failed';
    const STATE_CANCELLED = 'cancelled';
    const STATE_REFUNDED = 'refunded';
    const STATE_UNKNOWN = 'unknown';

    /**
     * @return PaymentProviderInterface
     */
    public function getPaymentProvider(): PaymentProviderInterface;

    /**
     * @param $paymentProvider
     *
     * @return static
     */
    public function setPaymentProvider(PaymentProviderInterface $paymentProvider): PaymentInterface;

    /**
     * @return \DateTime
     */
    public function getDatePayment(): \DateTime;

    /**
     * @param $datePayment
     *
     * @return static
     */
    public function setDatePayment($datePayment): PaymentInterface;

    /**
     * @return string
     */
    public function getState(): string;

    /**
     * @param $state
     *
     * @return static
     */
    public function setState($state): PaymentInterface;

    /**
     * @return CurrencyInterface
     */
    public function getCurrency(): CurrencyInterface;

    /**
     * @param CurrencyInterface $currency
     *
     * @return static
     */
    public function setCurrency($currency): PaymentInterface;

    /**
     * @param int $amount
     *
     * @return static
     */
    public function setTotalAmount($amount);

    /**
     * @param $number
     *
     * @return static
     */
    public function setNumber($number);

    /**
     * @param int $orderId
     *
     * @return static
     */
    public function setOrderId($orderId): PaymentInterface;

    /**
     * @return int
     */
    public function getOrderId(): int;
}
