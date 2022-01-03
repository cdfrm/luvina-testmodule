<?php

namespace Luvina\TestModule\Model;

use Magento\Framework\Model\AbstractModel;

class Gift extends AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{


    const CACHE_TAG = 'gifts_gifts_tag';

    protected function _construct()
    {
        $this->_init(\Luvina\TestModule\Model\ResourceModel\Gift::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
