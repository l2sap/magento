<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class Update extends \Magento\Framework\App\Action\Action
{
    
    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Mageplaza\HelloWorld\Model\PostFactory $postFactory
    ) {
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }


    public function execute()
    {
        $id = $this->_request->getParam('id');
        
        $name = $this->_request->getParam('name');
        $post_content = $this->_request->getParam('post_content');
        $updated_at = $this->_request->getParam('updated_at');

        $post = $this->_postFactory->create();
        $post->setData([
            'name' => 'Post',
            'post_content' => 'Post6_content',
            'created_at' => '2021/06/5',
            'updated_at' => '2021/06/19'
        ]);

        $post->save();

        return $this->_redirect('helloworld/index/index');
    }
}
