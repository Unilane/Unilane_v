<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Unilane\SyncProducts\Controller\Adminhtml\Products;

use Magento\Framework\Controller\ResultFactory;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
/**
 * Class ValidateApi
 */
class ImportProducts extends \Magento\Backend\App\Action implements \Magento\Framework\App\Action\HttpPostActionInterface
{
    const ADMIN_RESOURCE = 'Magento_Backend::content';
    private $productFactory;
    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context     
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Catalog\Model\ProductFactory $productFactory
    ) {
        parent::__construct($context);
        $this->productFactory = $productFactory;
    }

    /**
     * Send test request to Google Maps and return response
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        //CODIGO DE INSERCION        
        $data = file_get_contents("C:\Users\luis.olivarria\Desktop\productsjson\dataPrueba.json");
        if($data){
            try {
                $products = json_decode($data, true);
                foreach($products as $product){
                    // $producto = $objectManager->create('\Magento\Catalog\Model\Product');
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
                    $items->setGTIN('t');
                    $items->setCategoryIds([
                        1,2,3
                    ]);
                    $items->setStockData(
                        array( 
                        'use_config_manage_stock' => 1,                       
                        'manage_stock' => 1,
                        'is_in_stock' => 1,   
                        'qty' => 6
                        )
                    );
                    $items->save();
                }          

            } catch (Exception $e) {
                // No Ip found in database
                $data = [];
            }           
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($validationResult);
    }
}
