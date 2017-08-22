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

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderDocumentPrintController extends FrontendController
{
    /**
     * @param Request $request
     * @param $document
     * @param $order
     * @return Response
     */
    public function invoiceAction(Request $request, $document, $order): Response
    {
        return $this->render('CoreShopOrderBundle:OrderDocumentPrint:invoice.html.twig', [
            'document' => $document,
            'order' => $order,
        ]);
    }

    /**
     * @param Request $request
     * @param $document
     * @param $order
     * @return Response
     */
    public function shipmentAction(Request $request, $document, $order): Response
    {
        return $this->render('CoreShopOrderBundle:OrderDocumentPrint:shipment.html.twig', [
            'document' => $document,
            'order' => $order,
        ]);
    }

    /**
     * @param Request $request
     * @param $document
     * @param $order
     * @return Response
     */
    public function headerAction(Request $request, $document, $order): Response
    {
        return $this->render('CoreShopOrderBundle:OrderDocumentPrint:header.html.twig', [
            'document' => $document,
            'order' => $order,
        ]);
    }

    /**
     * @param Request $request
     * @param $document
     * @param $order
     * @return Response
     */
    public function footerAction(Request $request, $document, $order): Response
    {
        return $this->render('CoreShopOrderBundle:OrderDocumentPrint:footer.html.twig', [
            'document' => $document,
            'order' => $order,
        ]);
    }
}
