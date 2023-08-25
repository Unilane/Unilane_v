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
    private $productFactory;

    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        array $data = []        
    )
    {
        parent::__construct($context, $data);
        $this->productFactory = $productFactory;

    }
    /**
     * @inheritdoc
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {     
        $data         = file_get_contents("C:\Users\luis.olivarria\Desktop\productsjson\dataPrueba.json");
        $dataCatagory = file_get_contents("C:\Users\luis.olivarria\Desktop\productsjson\arregloCategorias.json");
        if($data){
            try {
                $products  = json_decode($data, true);
                $categorys = json_decode($dataCatagory, true);
                foreach($products as $product){
                    $items = $this->productFactory->create();
                    $sumaExistencia = 0;
                    $pro = $product['existencia'];
                    foreach($pro as $existencia){
                        $sumaExistencia += $existencia;
                    }
                    $items->setAttributeSetId(4);
                    $items->setName($product['nombre']);
                    $items->setSku($product['clave']);
                    $items->setPrice($product['precio']);
                    $items->setVisibility(4);
                    $items->setStatus(1);
                    $items->setTypeId('simple');
                    $items->setTaxClassId(1);
                    $items->setWebsiteIds([1]);
                    //ICECAT
                    $items->setGtinEan($product['upc'] == "" || null ? $product['ean'] : $product['upc']);
                    $items->setBrandName($product['marca']);
                    $items->setProductCode($product['numParte']);                    
                    $items->setCategoryIds([
                        2,24,31,243
                    ]);
                    $items->setStockData(
                        array( 
                        'use_config_manage_stock' => 1,                       
                        'manage_stock' => 1,
                        'is_in_stock' => 1,   
                        'qty' => $sumaExistencia
                        )
                    );
                    $items->save();
                }
            } catch (Exception $e) {
                $data = [];
            }           
        }
        else{
        }
       
        // $button = $this->getLayout()->createBlock(
        //     'Magento\Backend\Block\Widget\Button'
        // )->setData([
        //     'id' => 'sync-products',
        //     'label' => __('Sync Products'),
        // ])->setDataAttribute(
        //     ['role' => 'sync-products']
        // );

        // /** @var \Magento\Backend\Block\Template $block */
        // $block = $this->_layout->createBlock('Unilane\SyncProducts\Block\Adminhtml\System\Config\Form\Field\Import');
        // $block->setTemplate('Unilane_SyncProduct::products.phtml')->setChild('button', $button)->setData('select_html', parent::_getElementHtml($element));
        // return $block->toHtml();
    }
}
