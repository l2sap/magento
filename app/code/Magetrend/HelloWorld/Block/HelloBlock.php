<?php

namespace Magetrend\HelloWorld\Block;

class HelloBlock extends \Magento\Framework\View\Element\Template
{
    public $productRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function getProductById($id)
    {
        if (is_null($id)) {
            return NULL;
        }

        return $this->productRepository->getById($id);
    }

    public function getProductBySky($sku)
    {
        return $this->productRepository->get($sku);
    }
}
