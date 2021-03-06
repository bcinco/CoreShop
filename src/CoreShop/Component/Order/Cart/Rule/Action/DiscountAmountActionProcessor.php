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

namespace CoreShop\Component\Order\Cart\Rule\Action;

use CoreShop\Component\Currency\Context\CurrencyContextInterface;
use CoreShop\Component\Currency\Converter\CurrencyConverterInterface;
use CoreShop\Component\Currency\Repository\CurrencyRepositoryInterface;
use CoreShop\Component\Order\Model\CartInterface;
use CoreShop\Component\Order\Model\ProposalCartPriceRuleItemInterface;

class DiscountAmountActionProcessor implements CartPriceRuleActionProcessorInterface
{
    /**
     * @var CurrencyConverterInterface
     */
    protected $moneyConverter;

    /**
     * @var CurrencyRepositoryInterface
     */
    protected $currencyRepository;

    /**
     * @var CurrencyContextInterface
     */
    protected $currencyContext;

    /**
     * @param CurrencyRepositoryInterface $currencyRepository
     * @param CurrencyConverterInterface $moneyConverter
     * @param CurrencyContextInterface $currencyContext
     */
    public function __construct(CurrencyRepositoryInterface $currencyRepository, CurrencyConverterInterface $moneyConverter, CurrencyContextInterface $currencyContext)
    {
        $this->currencyRepository = $currencyRepository;
        $this->moneyConverter = $moneyConverter;
        $this->currencyContext = $currencyContext;
    }


    /**
     * {@inheritdoc}
     */
    public function applyRule(CartInterface $cart, array $configuration, ProposalCartPriceRuleItemInterface $cartPriceRuleItem)
    {
        $discountNet = $this->getDiscount($cart, false, $configuration);
        $discountGross = $this->getDiscount($cart, true, $configuration);

        if ($discountGross <= 0) {
            return false;
        }

        $cartPriceRuleItem->setDiscount($cartPriceRuleItem->getDiscount(false) + $discountNet, false);
        $cartPriceRuleItem->setDiscount($cartPriceRuleItem->getDiscount(true) + $discountGross, true);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function unApplyRule(CartInterface $cart, array $configuration, ProposalCartPriceRuleItemInterface $cartPriceRuleItem)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function getDiscount(CartInterface $cart, $withTax, array $configuration)
    {
        $applyOn = isset($configuration['applyOn']) ? $configuration['applyOn'] : 'total';

        if ('total' === $applyOn) {
            $cartAmount = $cart->getTotal($withTax);
        }
        else {
            $cartAmount = $cart->getSubtotal($withTax);
        }

        $amount = $configuration['amount'];
        $currency = $this->currencyRepository->find($configuration['currency']);

        if ($cart->getSubtotalTax() > 0) {
            $cartAverageTax = $cart->getSubtotalTax() / $cart->getSubtotal(true);

            if ($configuration['gross']) {
                if (!$withTax) {
                    $amount /= 1 + $cartAverageTax;
                }
            } else {
                if ($withTax) {
                    $amount *= 1 + $cartAverageTax;
                }
            }
        }

        return (int)$this->moneyConverter->convert($this->getApplicableAmount($cartAmount, $amount), $currency->getIsoCode(), $this->currencyContext->getCurrency()->getIsoCode());
    }

    /**
     * @param $cartAmount
     * @param $ruleAmount
     * @return int
     */
    protected function getApplicableAmount($cartAmount, $ruleAmount)
    {
        return min($cartAmount, $ruleAmount);
    }
}
