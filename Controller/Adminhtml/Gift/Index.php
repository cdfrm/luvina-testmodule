<?php

namespace Luvina\TestModule\Controller\Adminhtml\Gift;

use Magento\Framework\Controller\ResultFactory;

class Index extends AbstractAction
{

    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu('Luvina_TestModule::manage');
        $resultPage->addBreadcrumb(__('Gifts'), __('Gifts'));
        $resultPage->addBreadcrumb(__('Manage Gifts'), __('Manage Gifts'));
        $resultPage->getConfig()->getTitle()->prepend(__('Gifts List'));

        return $resultPage;
    }
}
