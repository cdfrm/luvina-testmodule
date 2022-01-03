<?php

namespace Luvina\TestModule\Block\Form\Gift;

use Magento\Backend\Block\Widget\Context;

class GenericButton
{
    public function __construct(
        Context $context
    )
    {
        $this->context = $context;
        $this->urlBuilder = $context->getUrlBuilder();
    }

}
