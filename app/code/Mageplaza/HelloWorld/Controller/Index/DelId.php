<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class Delid extends \Magento\Framework\App\Action\Action
{

    protected $_postFactory;
    //protected $_request;


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
        $id = $this->_request->getParam('id');
        $post = $this->_postFactory->create();
        $post->load($id);
        $post->delete();
        //$result = $post->setId($id);
        //$result = $result->delete();
        return $this->_redirect('helloworld/index/index');
    }
}
