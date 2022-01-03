<?php

namespace Luvina\TestModule\Ui\Component\Listing\Column;
use Luvina\TestModule\Api\Data\GiftInterface;

class GiftAction extends \Magento\Ui\Component\Listing\Columns\Column
{
    const URL_PATH_EDIT = 'gift/gift/edit';
    const URL_PATH_DELETE = 'gift/gift/delete';

    protected $urlBuilder;

    /**
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */

    /**
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item[GiftInterface::GIFT_ID])) {
                    $data = [GiftInterface::GIFT_ID => $item[GiftInterface::GIFT_ID]];

                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                               $data
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    $data
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Are you sure?'),
                                'message' => __('Are you sure you wan\'t to delete this record(s)?')
                            ]
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }


}
