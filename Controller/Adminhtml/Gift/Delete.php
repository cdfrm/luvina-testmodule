<?php

namespace Luvina\TestModule\Controller\Adminhtml\Gift;

use Luvina\TestModule\Api\Data\GiftInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;

class Delete extends AbstractAction
{

    public function execute()
    {
        $id = (int)$this->getRequest()->getParam(GiftInterface::GIFT_ID);
        $model = $this->model->create();
        $this->resource->load($model, $id, GiftInterface::GIFT_ID);

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('*/*/');
        try {
            $this->resource->delete($model);
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }

        return $resultRedirect;
    }
}
