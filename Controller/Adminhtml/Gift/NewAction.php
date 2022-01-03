<?php

namespace Luvina\TestModule\Controller\Adminhtml\Gift;

use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class NewAction extends AbstractAction
{

    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Luvina_TestModule::manage');
        $resultPage->getConfig()->getTitle()->prepend(__('New Gift'));

        return $resultPage;
    }
}
