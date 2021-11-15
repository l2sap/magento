<?php

namespace Perspective\LayoutExp\Controller\Index;

use \Magento\Framework\App\Action\Action as Action;
use \Magento\Framework\App\Action\Context as Context;
use \Magento\Framework\View\Result\PageFactory as PageFactory;

class Index extends Action
{
    protected $pageFactory;
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    public function execute()
    {

        return $this->pageFactory->create();
    }
}
