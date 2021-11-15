<?php

namespace Perspective\HelloWorld\Model\ResourceModel\PerspectiveModel;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init(
            'Perspective\HelloWorld\Model\PerspectiveModel',
            'Perspective\HelloWorld\Model\ResourceModel\PerspectiveModel'
        );
    }
}
