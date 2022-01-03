<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class Create extends \Magento\Framework\App\Action\Action
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
        $post1 = $this->_postFactory->create();
        $post1->setName('Post4');
        $post1->setPost_content('Post4_content');
        $post1->setCreated_at('2021/06/10');
        $post1->setUpdated_at('2021/06/15');
        $post1->save();
        $post2 = $this->_postFactory->create();
        $post2->setData('name', 'Post5');
        $post2->setData('post_content', 'Post5_content');
        $post2->setData('created_at', '2021/06/9');
        $post2->setData('updated_at', '2021/06/14');
        $post2->save();
        $post3 = $this->_postFactory->create();
        $post3->setData([
            'name' => 'Post6',
            'post_content' => 'Post6_content',
            'created_at' => '2021/06/5',
            'updated_at' => '2021/06/19'
        ]);
        $post3->save();
        return $this->_redirect('helloworld/index/index');
    }
}
