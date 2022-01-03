<?php

namespace Luvina\TestModule\Model\ResourceModel;

class Gift extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('gifts', 'id');
    }
}
