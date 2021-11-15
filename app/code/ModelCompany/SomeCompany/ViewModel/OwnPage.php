<?php

namespace ModelCompany\SomeCompany\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class OwnPage implements ArgumentInterface
{

    protected $_pageFactory;

    public function __construct(

        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    ) {

        $this->_productCollectionFactory = $productCollectionFactory;
    }


    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('name', 'sku', 'price')->
        addCategoriesFilter(['in' => $ids])->
        addAttributeToFilter('price', array('gteq' => 50))->
        addAttributeToFilter('price', array('lteq' => 60))->
        addAttributeToFilter('visibility', \Magento\Catalog\Model\Product\Visibility::VISIBILITY_NOT_VISIBLE)->
        addAttributeToFilter('status', \Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED)->
        setOrder('price', 'DESC');

        return $collection;
    }
}
