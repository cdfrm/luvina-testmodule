<?php

namespace Luvina\TestModule\Model\ResourceModel\Gift;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(\Luvina\TestModule\Model\Gift::class, \Luvina\TestModule\Model\ResourceModel\Gift::class);
    }
}
