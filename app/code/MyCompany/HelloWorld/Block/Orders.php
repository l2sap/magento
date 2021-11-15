<?php

namespace MyCompany\HelloWorld\Block;

class Orders extends \Magento\Framework\View\Element\Template
{

    protected $orders;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        \Magento\Sales\Model\Order $orderConfig,
        array $data = []
    ) {
        $this->_orderCollectionFactory = $orderCollectionFactory;
        $this->_orderConfig = $orderConfig;
        parent::__construct($context, $data);
    }

    public function getOrders()
    {
        if (!$this->orders) {
            $this->orders = $this->_orderCollectionFactory->create()->addFieldToSelect('*');
        }
        return $this->orders;
    }


    public function getOrderCollectionByCustomerId($customerId)
    {
        $collection = $this->_orderCollectionFactory->create($customerId)->addFieldToSelect('*');

        return $collection;
    }

    public function getOrderCollectionByDate($from, $to)
    {
        $collection = $this->_orderCollectionFactory->create()->addFieldToSelect('*')
            ->addFieldToFilter(
                'created_at',
                ['gteq' => $from]
            )
            ->addFieldToFilter(
                'created_at',
                ['lteq' => $to]
            )
            ->setOrder(
                'created_at',
                'desc'
            );

        return $collection;
    }
}
