<?php

namespace Luvina\TestModule\Controller\Adminhtml\Gift;

use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;

class Edit extends AbstractAction
{
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Luvina_TestModule::manage');
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Gift'));

        return $resultPage;
    }
}
