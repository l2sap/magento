<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class listId extends \Magento\Framework\App\Action\Action
{
    protected $_postFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Mageplaza\HelloWorld\Model\PostFactory $postFactory
        //\Magento\Framework\App\Request\Http $request
    ) {
        $this->_postFactory = $postFactory;
        //$this->_request = $request;
        return parent::__construct($context);
    }
    public function execute()
    {
        $id = '1';
        $post = $this->_postFactory->create();
        $post->load($id);
        print_r($post->toArray());
        echo "<a class='action primary' href='http://magento23.loc/helloworld/'> Complite</a>";
    }
}
