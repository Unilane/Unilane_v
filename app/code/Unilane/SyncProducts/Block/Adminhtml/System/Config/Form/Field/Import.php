<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Unilane\SyncProducts\Block\Adminhtml\System\Config\Form\Field;
use Magento\Backend\Block\Template\Context;
/**
 * @api
 */
class Import extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }
    /**
     * @inheritdoc
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {          
        $button = $this->getLayout()->createBlock(
            'Magento\Backend\Block\Widget\Button'
        )->setData([
            'id' => 'sync-products',
            'label' => __('Sync Products'),
        ])->setDataAttribute(
            ['role' => 'sync-products']
        );

        /** @var \Magento\Backend\Block\Template $block */
        $block = $this->_layout->createBlock('Unilane\SyncProducts\Block\Adminhtml\System\Config\Form\Field\Import');
        $block->setTemplate('Unilane_SyncProduct::products.phtml')->setChild('button', $button)->setData('select_html', parent::_getElementHtml($element));
        return $block->toHtml();
    }
}
