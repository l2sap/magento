<?php

namespace ModelCompany\Colection\ViewModel;

use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Colection implements ArgumentInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var CollectionFactory
     */
    private $categoryCollectionFactory;
    /**
     * @var Visibility
     */
    private $visibility;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        CollectionFactory $categoryCollectionFactory,
        Visibility $visibility
    )
    {
        $this->collectionFactory=$collectionFactory;
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        $this->visibility = $visibility;
    }
    public function getCollection(int $page = 1, int $pageSize = 5): \Magento\Catalog\Model\ResourceModel\Product\Collection
    {
        $collection = $this->collectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setVisibility([Visibility::VISIBILITY_BOTH]);
        $collection->addCategoriesFilter(['in' => [8]]);
        $collection->setPage($page, $pageSize);
        return $collection;
    }
    public function getCategoriesByIds(array $ids): \Magento\Catalog\Model\ResourceModel\Category\Collection
    {
        $collection = $this->categoryCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('entity_id', ['in' => $ids]);
        return $collection;
    }

    public function getVisibilityLabel($visibility)
    {
        return $this->visibility->getOptionArray()[$visibility] ?? $visibility;
    }
}
