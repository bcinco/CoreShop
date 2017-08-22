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

namespace CoreShop\Component\Currency\Model;

use CoreShop\Component\Resource\Model\AbstractResource;
use CoreShop\Component\Resource\Model\TimestampableTrait;

class Currency extends AbstractResource implements CurrencyInterface
{
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
     * @var string
     */
    protected $isoCode;

    /**
     * @var int
     */
    protected $numericIsoCode;

    /**
     * @var string
     */
    protected $symbol;

    /**
     * @return string
     */
    public function __toString(): string
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
    public function setId($id): CurrencyInterface
    {
        $this->id = $id;

        return $this;
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
    public function setName(string $name): CurrencyInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsoCode(): ?string
    {
        return $this->isoCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsoCode(string $isoCode): CurrencyInterface
    {
        $this->isoCode = $isoCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumericIsoCode(): ?int
    {
        return $this->numericIsoCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumericIsoCode(int $numericIsoCode): CurrencyInterface
    {
        $this->numericIsoCode = $numericIsoCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    /**
     * {@inheritdoc}
     */
    public function setSymbol(string $symbol): CurrencyInterface
    {
        $this->symbol = $symbol;

        return $this;
    }
}
