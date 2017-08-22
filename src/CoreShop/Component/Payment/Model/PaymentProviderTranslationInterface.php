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

use CoreShop\Component\Resource\Model\ResourceInterface;
use CoreShop\Component\Resource\Model\TimestampableInterface;

interface PaymentProviderTranslationInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     *
     * @return static
     */
    public function setName(string $name): PaymentProviderTranslationInterface;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $description
     *
     * @return static
     */
    public function setDescription(string $description): PaymentProviderTranslationInterface;

    /**
     * @return string
     */
    public function getInstructions(): string;

    /**
     * @param string $instructions
     *
     * @return static
     */
    public function setInstructions(string $instructions): PaymentProviderTranslationInterface;
}
