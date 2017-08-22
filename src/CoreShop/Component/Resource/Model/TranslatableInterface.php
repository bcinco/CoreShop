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

namespace CoreShop\Component\Resource\Model;

use Doctrine\Common\Collections\Collection;

interface TranslatableInterface
{
    /**
     * @return Collection|TranslationInterface[]
     */
    public function getTranslations(): Collection;

    /**
     * @param ?string $locale
     *
     * @return TranslationInterface
     */
    public function getTranslation(?string $locale): TranslationInterface;

    /**
     * @param TranslationInterface $translation
     *
     * @return bool
     */
    public function hasTranslation(TranslationInterface $translation): bool;

    /**
     * @param TranslationInterface $translation
     *
     * @return static
     */
    public function addTranslation(TranslationInterface $translation): TranslatableInterface;

    /**
     * @param TranslationInterface $translation
     *
     * @return static
     */
    public function removeTranslation(TranslationInterface $translation): TranslatableInterface;

    /**
     * @param string $locale
     *
     * @return static
     */
    public function setCurrentLocale($locale): TranslatableInterface;

    /**
     * @param string $locale
     *
     * @return static
     */
    public function setFallbackLocale($locale): TranslatableInterface;
}
