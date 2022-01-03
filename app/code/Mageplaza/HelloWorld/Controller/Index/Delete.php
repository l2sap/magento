<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
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
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        foreach ($collection as $item) {
            $post->load($item->getId());
            $post->delete();
        }
        return $this->_redirect('helloworld/index/index');
    }
}
