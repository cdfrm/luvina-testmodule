<?php

namespace Luvina\TestModule\Controller\Adminhtml\Gift;

use Luvina\TestModule\Api\Data\GiftInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Save extends AbstractAction implements HttpPostActionInterface
{

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $params = $this->getRequest()->getParams();
        $data = $params['general'];
        try {

            $model = $this->model->create();
            $model->addData($data);
            $model->setHasDataChanges(true);

            if (!$model->getData(GiftInterface::GIFT_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
            $this->messageManager->addSuccessMessage(
                __('The Gift was saved successfully')
            );
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }

        return $resultRedirect->setPath('*/*/');
    }
}
