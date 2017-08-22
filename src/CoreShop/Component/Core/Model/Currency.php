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

use CoreShop\Component\Currency\Model\Currency as BaseCurrency;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Currency extends BaseCurrency implements CurrencyInterface
{
    /**
     * @var Collection|CountryInterface[]
     */
    protected $countries;

    /**
     * Currency constructor.
     */
    public function __construct()
    {
        $this->countries = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCountries(): bool
    {
        return !$this->countries->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function addCountry(CountryInterface $country): CurrencyInterface
    {
        if (!$this->hasCountry($country)) {
            $this->countries->add($country);
            $country->setCurrency($this);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeCountry(CountryInterface $country): CurrencyInterface
    {
        if ($this->hasCountry($country)) {
            $this->countries->removeElement($country);
            $country->setCurrency(null);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCountry(CountryInterface $country): bool
    {
        return $this->countries->contains($country);
    }
}
