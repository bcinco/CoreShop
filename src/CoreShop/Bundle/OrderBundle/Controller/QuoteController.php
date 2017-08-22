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

namespace CoreShop\Bundle\OrderBundle\Controller;

use CoreShop\Component\Resource\Repository\PimcoreRepositoryInterface;
use Pimcore\Model\Object\Listing;

class QuoteController extends AbstractSaleController
{
    /**
     * {@inheritdoc}
     */
    protected function getGridColumns(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    protected function getSaleRepository(): PimcoreRepositoryInterface
    {
        return $this->get('coreshop.repository.quote');
    }

    /**
     * {@inheritdoc}
     */
    protected function getSalesList(): Listing
    {
        return $this->getSaleRepository()->getList();
    }

    /**
     * {@inheritdoc}
     */
    protected function getSaleClassName(): string
    {
        return 'coreshop.model.quote.pimcore_class_id';
    }

    /**
     * {@inheritdoc}
     */
    protected function getOrderKey(): string
    {
        return 'quoteDate';
    }

    /**
     * {@inheritdoc}
     */
    protected function getSaleNumberField(): string
    {
        return 'quoteNumber';
    }
}
