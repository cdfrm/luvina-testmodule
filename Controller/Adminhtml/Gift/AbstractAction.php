<?php

namespace Luvina\TestModule\Controller\Adminhtml\Gift;

use Magento\Backend\App\Action\Context;

class AbstractAction extends \Magento\Backend\App\Action
{
    public function __construct(
        Context $context,
        \Luvina\TestModule\Model\ResourceModel\Gift $resource,
        \Luvina\TestModule\Model\GiftFactory $model
    )
    {
        $this->model = $model;
        $this->resource = $resource;
        parent::__construct($context);
    }

    public function execute()
    {
        // TODO: Implement execute() method.
    }
}
