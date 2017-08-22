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

namespace CoreShop\Component\Order\Checkout;

use CoreShop\Component\Order\Model\CartInterface;
use Symfony\Component\HttpFoundation\Request;

interface CheckoutManagerInterface
{
    /**
     * @param CheckoutStepInterface $step
     * @param $priority
     */
    public function addCheckoutStep(CheckoutStepInterface $step, $priority): void;

    /**
     * @return array
     */
    public function getSteps(): array;

    /**
     * @param $identifier
     *
     * @return CheckoutStepInterface
     */
    public function getStep($identifier): CheckoutStepInterface;

    /**
     * @param $identifier
     *
     * @return CheckoutStepInterface
     */
    public function getNextStep($identifier): CheckoutStepInterface;

    /**
     * @param $identifier
     *
     * @return CheckoutStepInterface
     */
    public function getPreviousStep($identifier): CheckoutStepInterface;

    /**
     * @param $identifier
     *
     * @return CheckoutStepInterface[]
     */
    public function getPreviousSteps($identifier): array;

    /**
     * @param CheckoutStepInterface $step
     * @param CartInterface $cart
     *
     * @return bool
     */
    public function validateStep(CheckoutStepInterface $step, CartInterface $cart): bool;

    /**
     * @param CheckoutStepInterface $step
     * @param CartInterface $cart
     * @param Request $request
     *
     * @return array
     */
    public function prepareStep(CheckoutStepInterface $step, CartInterface $cart, Request $request): array;

    /**
     * @param CartInterface $cart
     *
     * @return CheckoutStepInterface
     */
    public function getCurrentStep(CartInterface $cart): CheckoutStepInterface;

    /**
     * @param $identifier
     *
     * @return int
     */
    public function getCurrentStepIndex($identifier): int;

    /**
     * @param CheckoutStepInterface $step
     * @param CartInterface $cart
     * @param Request $request
     */
    public function commitStep(CheckoutStepInterface $step, CartInterface $cart, Request $request): void;
}
