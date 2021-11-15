<?php

namespace ModelCompany\SomeCompany\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class PaymentMethods implements ArgumentInterface
{

    protected $_orderPayment;

    protected $_paymentHelper;

    protected $_paymentConfig;

    public function __construct(
        \Magento\Sales\Model\ResourceModel\Order\Payment\Collection $orderPayment,
        \Magento\Payment\Helper\Data $paymentHelper,
        \Magento\Payment\Model\Config $paymentConfig
    ) {
        $this->_orderPayment = $orderPayment;
        $this->_paymentHelper = $paymentHelper;
        $this->_paymentConfig = $paymentConfig;
    }

    public function getAllPaymentMethods()
    {
        return $this->_paymentHelper->getPaymentMethods();
    }

    public function getAllPaymentMethodsList()
    {
        return $this->_paymentHelper->getPaymentMethodList();
    }

    public function getActivePaymentMethods()
    {
        return $this->_paymentConfig->getActiveMethods();
    }

    public function getUsedPaymentMethods()
    {
        $collection = $this->_orderPayment;
        $collection->getSelect()->group('method');
        $paymentMethods[] = array('value' => '', 'label' => 'Any');
        foreach ($collection as $col) {
            $paymentMethods[] = array('value' => $col->getMethod(), 'label' => $col->getAdditionalInformation()['method_title']);
        }
        return $paymentMethods;
    }
}
