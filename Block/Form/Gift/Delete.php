<?php

namespace Luvina\TestModule\Block\Form\Gift;

use Luvina\TestModule\Api\Data\GiftInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete extends GenericButton implements ButtonProviderInterface
{

    public function getButtonData()
    {
        return [
            'label' => __('Delete'),
            'class' => 'delete',
            'on_click' => 'deleteConfirm(\''
                . __('Are you sure you want to delete this Gift?')
                . '\', \'' . $this->urlBuilder->getUrl('*/*/delete', ['id' => (int)$this->context->getRequest()->getParam(GiftInterface::GIFT_ID)]) . '\')',
            'sort_order' => 90,
        ];
    }
}
