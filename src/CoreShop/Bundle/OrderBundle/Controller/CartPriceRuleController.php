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

use CoreShop\Bundle\OrderBundle\Form\Type\CartPriceRuleGeneratorType;
use CoreShop\Bundle\ResourceBundle\Controller\ResourceController;
use CoreShop\Component\Order\Generator\CartPriceRuleVoucherCodeGenerator;
use CoreShop\Component\Order\Model\CartPriceRuleInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartPriceRuleController extends ResourceController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function getConfigAction(Request $request): Response
    {
        $actions = $this->getConfigActions();
        $conditions = $this->getConfigConditions();

        return $this->viewHandler->handle(['actions' => array_keys($actions), 'conditions' => array_keys($conditions)]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getVoucherCodesAction(Request $request): Response
    {
        $id = $request->get('id');
        $cartPriceRule = $this->repository->find($id);

        if (!$cartPriceRule instanceof CartPriceRuleInterface) {
            throw new NotFoundHttpException();
        }

        return $this->viewHandler->handle(['total' => count($cartPriceRule->getVoucherCodes()), 'data' => $cartPriceRule->getVoucherCodes(), 'success' => true], ['group' => 'Detailed']);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function generateVoucherCodesAction(Request $request): Response
    {
        $form = $this->get('form.factory')->createNamed('', CartPriceRuleGeneratorType::class);

        $handledForm = $form->handleRequest($request);

        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true) && $handledForm->isValid()) {
            $resource = $form->getData();

            $codes = $this->getVoucherCodeGenerator()->generateCodes($resource);

            foreach ($codes as $code) {
                $this->manager->persist($code);
            }
            $this->manager->flush();

            return $this->viewHandler->handle(['success' => true]);
        }

        return $this->viewHandler->handle(['success' => false]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function exportVoucherCodesAction(Request $request): Response
    {
        $id = $request->get('id');
        $priceRule = $this->repository->find($id);

        if ($priceRule instanceof CartPriceRuleInterface) {
            $fileName = $priceRule->getName().'_vouchercodes';
            $csvData = [];

            $csvData[] = implode(',', [
                'code',
                'creationDate',
                'used',
                'uses',
            ]);

            foreach ($priceRule->getVoucherCodes() as $code) {
                $data = [
                    'code' => $code->getCode(),
                    'creationDate' => $code->getCreationDate() instanceof \DateTime ? $code->getCreationDate()->getTimestamp() : '',
                    'used' => $code->getUsed(),
                    'uses' => $code->getUses(),
                ];

                $csvData[] = implode(';', $data);
            }

            $csv = implode(PHP_EOL, $csvData);

            header('Content-Encoding: UTF-8');
            header('Content-type: text/csv; charset=UTF-8');
            header("Content-Disposition: attachment; filename=\"$fileName.csv\"");
            ini_set('display_errors', false); //to prevent warning messages in csv
            echo "\xEF\xBB\xBF";
            echo $csv;
            die();
        }

        exit;
    }

    /**
     * @return CartPriceRuleVoucherCodeGenerator
     */
    protected function getVoucherCodeGenerator(): CartPriceRuleVoucherCodeGenerator
    {
        return $this->get('coreshop.generator.cart_price_rule_voucher_codes');
    }

    /**
     * @return array
     */
    protected function getConfigActions(): array
    {
        return $this->getParameter('coreshop.cart_price_rule.actions');
    }

    /**
     * @return array
     */
    protected function getConfigConditions(): array
    {
        return $this->getParameter('coreshop.cart_price_rule.conditions');
    }
}
