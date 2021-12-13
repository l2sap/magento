<?php

namespace Perspective\TutorialProductPage\Block;

class QtyProduct extends \Magento\Framework\View\Element\Template
{    
    
    protected $_registry;
    protected $_stockRegistry;
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Framework\Registry $registry,
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry,
        array $data = []
        )
        {
            $this->_registry = $registry;
            $this->_stockRegistry = $stockRegistry;
            parent::__construct($context, $data);
    }

    
    public function getCurrentProduct()
    {        
        return $this->_registry->registry('current_product');
    }

    public function getStockItem($productId)
    {
        return $this->_stockRegistry->getStockItem($productId);
    }


}