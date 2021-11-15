<?php
namespace Perspective\CatalogActiveRule\Model;

use Magento\CatalogRule\Model\ResourceModel\Rule\CollectionFactory as RuleCollectionFactory;

class Index
{
    /**
     * @var RuleCollectionFactory
     */
    protected $ruleCollectionFactory;

    public function __construct(
        RuleCollectionFactory $ruleCollectionFactory
    ) {
        $this->ruleCollectionFactory = $ruleCollectionFactory;
    }

    public function getAllActiveCatalogRule()
    {
        $catalogActiveRule = $this->ruleCollectionFactory->create()->addFieldToFilter('is_active', 1);

        return $catalogActiveRule;
    }
}