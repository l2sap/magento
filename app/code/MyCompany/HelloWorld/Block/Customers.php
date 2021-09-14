<?php

namespace MyCompany\HelloWorld\Block;

class Customers extends \Magento\Framework\View\Element\Template
{
    protected $_customer;
    protected $_customerFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\Customer $customers,
        array $data = []
    ) {
        $this->_customerFactory = $customerFactory;
        $this->_customer = $customers;
        parent::__construct($context, $data);
    }

    public function getCustomerCollection()
    {
        return $this->_customer->getCollection()->addAttributeToSelect("*")->load();
    }

    public function getFilteredCustomerCollection()
    {
        return $this->_customerFactory->create()->getCollection()->addAttributeToSelect("*")
            ->addAttributeToFilter("firstname", array("eq" => "Max"))
            ->load();
    }
}
