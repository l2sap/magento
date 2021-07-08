<?php

namespace Perspective\HelloWorld\Controller\Index;

use \Magento\Framework\App\Action\Action as Action;

class Testpage extends Action
{
    protected $_pageFactory;
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
