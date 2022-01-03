<?php

namespace Luvina\TestModule\Controller\Adminhtml\Gift;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class InlineEdit extends AbstractAction
{
    public function __construct(
        Context $context,
        \Luvina\TestModule\Model\ResourceModel\Gift $resource,
        \Luvina\TestModule\Model\GiftFactory $model,
        JsonFactory $jsonFactory
    )
    {
        $this->jsonFactory = $jsonFactory;
        parent::__construct($context, $resource, $model);
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax'))
        {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems))
            {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            }
            else
            {
                foreach (array_keys($postItems) as $modelid)
                {
                    $model = $this->model->create();
                    $this->resource->load($model, $modelid);
                    try
                    {
                        $model->setData(array_merge($model->getData(), $postItems[$modelid]));
                        $this->resource->save($model);
                    }
                    catch (\Exception $e)
                    {
                        $messages[] = "[Error : {$modelid}]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error]);
    }
}
