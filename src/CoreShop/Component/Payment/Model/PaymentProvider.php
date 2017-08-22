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

use CoreShop\Component\Resource\Model\AbstractResource;
use CoreShop\Component\Resource\Model\TimestampableTrait;
use CoreShop\Component\Resource\Model\ToggleableTrait;
use CoreShop\Component\Resource\Model\TranslatableTrait;

class PaymentProvider extends AbstractResource implements PaymentProviderInterface
{
    use TimestampableTrait;
    use ToggleableTrait;
    use TranslatableTrait {
        __construct as initializeTranslationsCollection;
    }

    /**
     * @var mixed
     */
    protected $id;

    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var int
     */
    protected $position = 1;

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
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
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * {@inheritdoc}
     */
    public function setIdentifier(string $identifier): PaymentProviderInterface
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(?string $language = null): ?string
    {
        return $this->getTranslation($language)->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name, ?string $language = null): PaymentProviderInterface
    {
        $this->getTranslation($language)->setName($name);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(?string $language = null): ?string
    {
        return $this->getTranslation($language)->getDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription(string $description, ?string $language = null): PaymentProviderInterface
    {
        $this->getTranslation($language)->setDescription($description);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getInstructions(?string $language = null): ?string
    {
        return $this->getTranslation($language)->getInstructions();
    }

    /**
     * {@inheritdoc}
     */
    public function setInstructions(string $instructions, ?string $language = null): PaymentProviderInterface
    {
        $this->getTranslation($language)->setInstructions($instructions);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function setPosition(int $position): PaymentProviderInterface
    {
        $this->position = $position;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation(): PaymentProviderTranslationInterface
    {
        return new PaymentProviderTranslation();
    }
}
