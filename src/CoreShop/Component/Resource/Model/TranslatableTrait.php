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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\PersistentCollection;

trait TranslatableTrait
{
    /**
     * @var ArrayCollection|PersistentCollection|TranslationInterface[]
     */
    protected $translations;

    /**
     * @var array|TranslationInterface[]
     */
    protected $translationsCache = [];

    /**
     * @var string
     */
    protected $currentLocale;

    /**
     * Cache current translation. Useful in Doctrine 2.4+.
     *
     * @var TranslationInterface
     */
    protected $currentTranslation;

    /**
     * @var string
     */
    protected $fallbackLocale;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslation(?string $locale, bool $useFallbackTranslation = true): TranslationInterface
    {
        $locale = $locale ?: $this->currentLocale;
        if (null === $locale) {
            throw new \RuntimeException('No locale has been set and current locale is undefined.');
        }

        if (isset($this->translationsCache[$locale])) {
            return $this->translationsCache[$locale];
        }

        $translation = $this->translations->get($locale);
        if (null !== $translation) {
            $this->translationsCache[$locale] = $translation;

            return $translation;
        }

        if ($useFallbackTranslation) {
            $fallbackTranslation = $this->translations->get($this->fallbackLocale);
            if (null !== $fallbackTranslation) {
                $this->translationsCache[$this->fallbackLocale] = $fallbackTranslation;

                return $fallbackTranslation;
            }
        }

        $translation = $this->createTranslation();
        $translation->setLocale($locale);

        $this->addTranslation($translation);

        $this->translationsCache[$locale] = $translation;

        return $translation;
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    /**
     * {@inheritdoc}
     */
    public function hasTranslation(TranslationInterface $translation): bool
    {
        return isset($this->translationsCache[$translation->getLocale()]) || $this->translations->containsKey($translation->getLocale());
    }

    /**
     * {@inheritdoc}
     */
    public function addTranslation(TranslationInterface $translation): TranslatableInterface
    {
        if (!$this->hasTranslation($translation)) {
            $this->translationsCache[$translation->getLocale()] = $translation;

            $this->translations->set($translation->getLocale(), $translation);
            $translation->setTranslatable($this);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTranslation(TranslationInterface $translation): TranslatableInterface
    {
        if ($this->translations->removeElement($translation)) {
            unset($this->translationsCache[$translation->getLocale()]);

            $translation->setTranslatable(null);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrentLocale($currentLocale): TranslatableInterface
    {
        $this->currentLocale = $currentLocale;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setFallbackLocale($fallbackLocale): TranslatableInterface
    {
        $this->fallbackLocale = $fallbackLocale;

        return $this;
    }

    /**
     * Create resource translation model.
     *
     * @return TranslationInterface
     */
    abstract protected function createTranslation();
}
