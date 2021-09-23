<?php

namespace MyCompany\HelloWorld\Block;

class GroupCustomers extends \Magento\Framework\View\Element\Template
{


    protected $_groupCustomer;


    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Model\ResourceModel\Group\Collection $groupCustomer,
        array $data = []
    ) {
        $this->_groupCustomer = $groupCustomer;
        parent::__construct($context, $data);
    }


    public function getCustomerGroups()
    {
        $groupsCustomer = $this->_groupCustomer->toOptionArray();
        return $groupsCustomer;
    }
}
