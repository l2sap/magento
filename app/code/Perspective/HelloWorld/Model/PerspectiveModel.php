<?php

namespace Perspective\HelloWorld\Model;

class PerspectiveModel extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Perspective\HelloWorld\Model\ResourceModel\PerspectiveModel');
    }
}
