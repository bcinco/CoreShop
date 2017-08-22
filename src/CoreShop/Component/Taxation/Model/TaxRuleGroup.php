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

use CoreShop\Component\Resource\Model\AbstractResource;
use CoreShop\Component\Resource\Model\TimestampableTrait;
use CoreShop\Component\Resource\Model\ToggleableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class TaxRuleGroup extends AbstractResource implements TaxRuleGroupInterface
{
    use ToggleableTrait;
    use TimestampableTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Collection|TaxRuleInterface[]
     */
    protected $taxRules;

    public function __construct()
    {
        $this->taxRules = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name): TaxRuleGroupInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaxRules(): Collection
    {
        return $this->taxRules;
    }

    /**
     * {@inheritdoc}
     */
    public function hasTaxRules(): bool
    {
        return !$this->taxRules->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function addTaxRule(TaxRuleInterface $taxRule): TaxRuleGroupInterface
    {
        if (!$this->hasTaxRule($taxRule)) {
            $this->taxRules->add($taxRule);

            $taxRule->setTaxRuleGroup($this);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTaxRule(TaxRuleInterface $taxRule): TaxRuleGroupInterface
    {
        if ($this->hasTaxRule($taxRule)) {
            $this->taxRules->removeElement($taxRule);
            $taxRule->setTaxRuleGroup(null);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasTaxRule(TaxRuleInterface $taxRule): bool
    {
        return $this->taxRules->contains($taxRule);
    }
}
