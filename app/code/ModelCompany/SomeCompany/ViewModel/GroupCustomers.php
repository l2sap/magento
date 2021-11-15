<?php

namespace ModelCompany\SomeCompany\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class GroupCustomers implements ArgumentInterface
{

    protected $_groupCustomer;

    public function __construct(
        \Magento\Customer\Model\ResourceModel\Group\Collection $groupCustomer
    ) {
        $this->_groupCustomer = $groupCustomer;
    }


    public function getCustomerGroups()
    {
        $groupsCustomer = $this->_groupCustomer->toOptionArray();
        return $groupsCustomer;
    }

}
