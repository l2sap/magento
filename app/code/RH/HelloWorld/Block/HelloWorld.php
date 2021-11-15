<?php

namespace RH\HelloWorld\Block;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class HelloWorld
{
    protected $product;
    protected $categoryCollection;
    public function __construct(Product $product, CollectionFactory $categoryCollection)
    {
        $this->product = $product;
        $this->categoryCollection = $categoryCollection;
    }

    public function getCategoriesName($productId)
    {
        $product = $this->product->load($productId);
        $categoryIds = $product->getCategoryIds();
        $categories = $this->categoryCollection->create()->addAttributeToSelect('*')->addAttributeToFilter('entity_id', $categoryIds);
        $categoryNames = [];
        foreach ($categories as $category) {
            $categoryNames[] = $category->getName();
        }
        $categoryName = implode(',', $categoryNames);
        echo '1';
        return $categoryName;
    }
}
