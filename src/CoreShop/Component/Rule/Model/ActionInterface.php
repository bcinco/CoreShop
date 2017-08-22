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

namespace CoreShop\Component\Rule\Model;

use CoreShop\Component\Resource\Model\ResourceInterface;

interface ActionInterface extends ResourceInterface
{
    /**
     * @return string
     */
    public function getType(): ?string;

    /**
     * @param string $type
     *
     * @return static
     */
    public function setType(string $type): ActionInterface;

    /**
     * @return array
     */
    public function getConfiguration(): array;

    /**
     * @param array $configuration
     *
     * @return static
     */
    public function setConfiguration(array $configuration): ActionInterface;
}
