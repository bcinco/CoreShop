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

namespace CoreShop\Bundle\FrontendBundle\Controller;

use CoreShop\Bundle\AddressBundle\Form\Type\AddressType;
use CoreShop\Bundle\CustomerBundle\Form\Type\CustomerType;
use CoreShop\Component\Address\Model\AddressInterface;
use CoreShop\Component\Customer\Model\CustomerInterface;
use CoreShop\Component\Order\Model\OrderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends FrontendController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function headerAction(Request $request): Response
    {
        return $this->renderTemplate('CoreShopFrontendBundle:Customer:_header.html.twig', [
            'catalogMode' => false,
            'customer' => $this->getCustomer(),
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function footerAction(Request $request): Response
    {
        return $this->renderTemplate('CoreShopFrontendBundle:Customer:_footer.html.twig', [
            'catalogMode' => false,
            'customer' => $this->getCustomer(),
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function profileAction(Request $request): Response
    {
        $customer = $this->getCustomer();

        if (!$customer instanceof CustomerInterface) {
            return $this->redirectToRoute('coreshop_index');
        }

        return $this->renderTemplate('CoreShopFrontendBundle:Customer:profile.html.twig', [
            'customer' => $customer,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function ordersAction(Request $request): Response
    {
        $customer = $this->getCustomer();

        if (!$customer instanceof CustomerInterface) {
            return $this->redirectToRoute('coreshop_index');
        }

        return $this->renderTemplate('CoreShopFrontendBundle:Customer:orders.html.twig', [
            'customer' => $customer,
            'orders' => $this->get('coreshop.repository.order')->findByCustomer($this->getCustomer())
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function orderDetailAction(Request $request): Response
    {
        $orderId = $request->get('order');
        $customer = $this->getCustomer();

        if (!$customer instanceof CustomerInterface) {
            return $this->redirectToRoute('coreshop_index');
        }

        $order = $this->get('coreshop.repository.order')->find($orderId);

        if (!$order instanceof OrderInterface) {
            return $this->redirectToRoute('coreshop_customer_orders');
        }

        if (!$order->getCustomer() instanceof CustomerInterface || $order->getCustomer()->getId() !== $customer->getId()) {
            return $this->redirectToRoute('coreshop_customer_orders');
        }

        return $this->renderTemplate('CoreShopFrontendBundle:Customer:order_detail.html.twig', [
            'customer' => $customer,
            'order' => $order
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function addressesAction(Request $request): Response
    {
        $customer = $this->getCustomer();

        if (!$customer instanceof CustomerInterface) {
            return $this->redirectToRoute('coreshop_index');
        }

        return $this->renderTemplate('CoreShopFrontendBundle:Customer:addresses.html.twig', [
            'customer' => $customer,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function addressAction(Request $request): Response
    {
        $customer = $this->getCustomer();

        if (!$customer instanceof CustomerInterface) {
            return $this->redirectToRoute('coreshop_index');
        }

        $addressId = $request->get('address');
        $address = $this->get('coreshop.repository.address')->find($addressId);

        if (!$address instanceof AddressInterface) {
            $address = $this->get('coreshop.factory.address')->createNew();
        } else {
            if (!$customer->hasAddress($address)) {
                return $this->redirectToRoute('coreshop_customer_addresses');
            }
        }

        $form = $this->get('form.factory')->createNamed('', AddressType::class, $address);

        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true)) {
            $handledForm = $form->handleRequest($request);

            if ($handledForm->isValid()) {
                $address = $handledForm->getData();

                $address->setPublished(true);
                $address->setKey(uniqid());
                $address->setParent($this->get('coreshop.object_service')->createFolderByPath(sprintf('/%s/%s', $customer->getFullPath(), $this->getParameter('coreshop.folder.address'))));
                $address->save();

                $customer->addAddress($address);
                $customer->save();

                return $this->redirectToRoute('coreshop_customer_addresses');
            }
        }

        return $this->renderTemplate('CoreShopFrontendBundle:Customer:address.html.twig', [
            'address' => $address,
            'customer' => $customer,
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function addressDeleteAction(Request $request): Response
    {
        $customer = $this->getCustomer();

        if (!$customer instanceof CustomerInterface) {
            return $this->redirectToRoute('coreshop_index');
        }

        $addressId = $request->get('address');
        $address = $this->get('coreshop.repository.address')->find($addressId);

        if (!$address instanceof AddressInterface) {
            return $this->redirectToRoute('coreshop_customer_addresses');
        } else {
            if (!$customer->hasAddress($address)) {
                return $this->redirectToRoute('coreshop_customer_addresses');
            }
        }

        $address->delete();

        return $this->redirectToRoute('coreshop_customer_addresses');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function settingsAction(Request $request): Response
    {
        $customer = $this->getCustomer();

        if (!$customer instanceof CustomerInterface) {
            return $this->redirectToRoute('coreshop_index');
        }

        $form = $this->get('form.factory')->createNamed('', CustomerType::class, $customer);

        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true)) {
            $handledForm = $form->handleRequest($request);

            if ($handledForm->isValid()) {
                $customer = $handledForm->getData();
                $customer->save();

                return $this->redirectToRoute('coreshop_customer_profile');
            }
        }

        return $this->renderTemplate('CoreShopFrontendBundle:Customer:settings.html.twig', [
            'customer' => $customer,
            'form' => $form->createView()
        ]);
    }

    /**
     * @return CustomerInterface|null
     */
    protected function getCustomer(): ?CustomerInterface
    {
        try {
            return $this->get('coreshop.context.customer')->getCustomer();
        } catch (\Exception $ex) {

        }

        return null;
    }
}
