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

use CoreShop\Component\Resource\Model\TimestampableInterface;
use CoreShop\Component\Resource\Model\ToggleableInterface;
use CoreShop\Component\Resource\Model\TranslatableInterface;

interface PaymentProviderInterface extends ToggleableInterface, TranslatableInterface, TimestampableInterface
{
    /**
     * @return string
     */
    public function getIdentifier(): ?string;

    /**
     * @param string $identifier
     *
     * @return static
     */
    public function setIdentifier(string $identifier): PaymentProviderInterface;

    /**
     * @param string|null $language
     *
     * @return string
     */
    public function getName(?string $language = null): ?string;

    /**
     * @param string $name
     * @param string|null $language
     *
     * @return static
     */
    public function setName(string $name, ?string $language = null): PaymentProviderInterface;

    /**
     * @param string|null $language
     *
     * @return string
     */
    public function getDescription(?string $language = null): ?string;

    /**
     * @param string $description
     * @param string|null $language
     *
     * @return static
     */
    public function setDescription(string $description, ?string $language = null): PaymentProviderInterface;

    /**
     * @param string|null $language
     *
     * @return string
     */
    public function getInstructions(?string $language = null): ?string;

    /**
     * @param string $instructions
     * @param string|null $language
     *
     * @return static
     */
    public function setInstructions(string $instructions, ?string $language = null): PaymentProviderInterface;

    /**
     * @return int
     */
    public function getPosition(): ?int;

    /**
     * @param int $position
     *
     * @return static
     */
    public function setPosition(int $position): PaymentProviderInterface;
}
