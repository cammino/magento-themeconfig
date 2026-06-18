<?php

class Cammino_Themeconfig_Order_StatusController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->getResponse()->setHeader('Content-type', 'application/json');

        $orderId = (int) $this->getRequest()->getParam('order_id');
        if (!$orderId) {
            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode(['success' => false]));
            return;
        }

        try {
            $order = Mage::getModel('sales/order')->load($orderId);
            if (!$order->getId()) {
                $this->getResponse()->setBody(Mage::helper('core')->jsonEncode(['success' => false]));
                return;
            }

            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode([
                'success' => true,
                'status'  => $order->getStatus(),
            ]));
        } catch (Exception $e) {
            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode(['success' => false]));
        }
    }
}
