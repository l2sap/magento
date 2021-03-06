<?php

namespace Perspective\CurrentCategory\Block;


use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;


class Index extends Template
{

    protected $registry;

    public function __construct(Context $context, Registry $registry)
    {
        $this->registry = $registry;
        parent::__construct($context);
    }

    public function getCurrentCategory()
    {
        return $this->registry->registry('current_category');
    }
}