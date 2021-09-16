<?php

namespace MyCompany\HelloWorld\Block;

class Orders extends \Magento\Framework\View\Element\Template
{

    protected $orders;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        array $data = []
    ) {
        $this->_orderCollectionFactory = $orderCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getOrders()
    {
        if (!$this->orders) {
            $this->orders = $this->_orderCollectionFactory->create()->addFieldToSelect('*');
        }
        return $this->orders;
    }
}
