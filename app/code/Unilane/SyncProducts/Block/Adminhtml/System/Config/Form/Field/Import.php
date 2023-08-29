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
        //CT     
        $data         = file_get_contents("C:\Users\luis.olivarria\Desktop\productsjson\dataPrueba.json");
        if($data){
            try {
                $products  = json_decode($data, true);
                foreach($products as $product){
                    $items = $this->productFactory->create();
                    $sumaExistencia = 0;
                    $pro = $product['existencia'];
                    foreach($pro as $existencia){
                        $sumaExistencia += $existencia;
                    }
                    $precioReal = $product['precio'] * $product['tipoCambio'];
                    $nombreCategoria = $product['subcategoria'];
                    if($nombreCategoria == "Cables USB" ){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,36,244
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
                    if($nombreCategoria == "Adaptadores de Energía" || $nombreCategoria == "Inversores de Energia"){
                        $items->setAttributeSetId(4);
                            $items->setName($product['nombre']."-".$product['clave']);
                            $items->setSku($product['clave']);
                            $items->setPrice($precioReal);
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
                                2,51,66,242
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
                    if($nombreCategoria == "Reemplazos"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,241
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
                    if($nombreCategoria == "Bancos de Batería"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,240
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
                    if($nombreCategoria == "Convertidores AV" || $nombreCategoria == "Transformadores" ){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,239,25,36,102
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
                    if($nombreCategoria == "Supresores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,238
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
                    if($nombreCategoria == "Regletas y Multicontactos"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,237
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
                    if($nombreCategoria == "Estaciones de Carga"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,236
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
                    if($nombreCategoria == "Reguladores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,235
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
                    if($nombreCategoria == "No Breaks y UPS"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,234
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
                    if($nombreCategoria == "Baterías"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,233
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
                    if($nombreCategoria == "Barra de Contactos"){                    
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,232
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
                    if($nombreCategoria == "SSD para servidores" || $nombreCategoria == "Storage"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,65,231
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
                    if($nombreCategoria == "Procesadores para Servidores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,65,230
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
                    if($nombreCategoria == "Memorias RAM para Servidores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,65,229
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
                    if($nombreCategoria == "Fuentes de Poder para Servidores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,65,228
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
                    if($nombreCategoria == "Discos Duros para Servidores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,65,227
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
                    if($nombreCategoria == "Cables para Servidores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,65,226
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
                    if($nombreCategoria == "Gabinetes de Piso" || $nombreCategoria == "Gabinetes para Montaje" || $nombreCategoria == "Servidores" || $nombreCategoria == "Servidores Rack" || $nombreCategoria == "Unidades Ópticas para Servidores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,65,225
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
                    if($nombreCategoria == "Tarjetas de Acceso"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,66,222
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
                    if($nombreCategoria == "Camaras Deteccion"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,64,217
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
                    if($nombreCategoria == "Accesorios para seguridad"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,64,216
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
                    if($nombreCategoria == "Soportes para Video Vigilancia"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,63,214
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
                    if($nombreCategoria == "Sirenas para Video Vigilancia"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,63,213
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
                    if($nombreCategoria == "Monitores para Video Vigilancia"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,63,212
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
                    if($nombreCategoria == "Kits de Video Vigilancia"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,63,211
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
                    if($nombreCategoria == "Grabadoras Digitales" || $nombreCategoria == "Grabadores analógicos" || $nombreCategoria == "Kit Analógicos HD" || $nombreCategoria == "Videovigilancia"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,63,210
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
                    if($nombreCategoria == "Fuentes de Poder para Video Vigilancia"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,63,209
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
                    if($nombreCategoria == "Cámara bala análogica" || $nombreCategoria == "Cámaras" || $nombreCategoria == "Cámaras de Video Vigilancia" || $nombreCategoria == "Cámaras domo analógicas" || $nombreCategoria == "Cámaras PTZ analógicas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,63,208,49,56,165,26,40,124
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
                    if($nombreCategoria == "Cables y conectores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,63,207
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
                    if($nombreCategoria == "Accesorios para Video Vigilancia" || $nombreCategoria == "Gabinete para Almacenaje"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,63,206
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
                    if($nombreCategoria == "Inyectores PoE"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,62,205
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
                    if($nombreCategoria == "Antenas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,62,204
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
                    if($nombreCategoria == "Accesorios para Racks" || $nombreCategoria == "Racks Modulo"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,62,203
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
                    if($nombreCategoria == "Networking" || $nombreCategoria == "PDU" || $nombreCategoria == "Switches"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,62,202
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
                    if($nombreCategoria == "Amplificadores Wifi" || $nombreCategoria == "Extensores de Red" || $nombreCategoria == "Hub y Concentadores Wifi" || $nombreCategoria == "Seguridad Inteligente"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,62,201
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
                    if($nombreCategoria == "Access Points" || $nombreCategoria == "Routers"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,62,200
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
                    if($nombreCategoria == "Accesorios para Cables" || $nombreCategoria == "Bobinas" || $nombreCategoria == "Cables de Red" || $nombreCategoria == "Fibras Ópticas" || $nombreCategoria == "Herramientas" || $nombreCategoria == "Herramientas para red" || $nombreCategoria == "Jacks"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,62,198
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
                    if($nombreCategoria == "Adaptadores de Ethernet" || $nombreCategoria == "Adaptadores Inalámbricos" ||$nombreCategoria == "Adaptadores para Apple" || $nombreCategoria == "Adaptadores para Audio" || $nombreCategoria == "Adaptadores para Red" || $nombreCategoria == "Adaptadores USB Red" || $nombreCategoria == "Tarjetas para Red"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,36,104
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
                    if($nombreCategoria == "Accesorios de Redes" || $nombreCategoria == "Adaptadores de Red" || $nombreCategoria == "Convertidor de medios" || $nombreCategoria == "Transceptores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,62,197
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
                    if($nombreCategoria == "Consumibles POS" || $nombreCategoria == "Etiquetas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,61,195
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
                    if($nombreCategoria == "Bases" || $nombreCategoria == "Baterías POS" || $nombreCategoria == "Cables POS"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,61,194
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
                    if($nombreCategoria == "Digitalizadores de Firmas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,61,193
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
                    if($nombreCategoria == "Terminales POS"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,61,192
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
                    if($nombreCategoria == "Monitores POS"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,61,191
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
                    if($nombreCategoria == "Lectores de Códigos de Barras"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,61,190
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
                    if($nombreCategoria == "Impresoras POS"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,61,189
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
                    if($nombreCategoria == "Cajones de Dinero"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,61,188
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
                    if($nombreCategoria == "Kit Punto de Venta"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,61,187
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
                    if($nombreCategoria == "Pcs de Escritorio Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,60,186
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
                    if($nombreCategoria == "Monitores Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,60,185
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
                    if($nombreCategoria == "Laptops Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,60,184
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
                    if($nombreCategoria == "Tarjetas de Video Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,183
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
                    if($nombreCategoria == "Consolas y Video Juegos" || $nombreCategoria == "Controles Gaming" || $nombreCategoria == "Pilas" || $nombreCategoria == "Soporte para Control"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,182
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
                    if($nombreCategoria == "Escritorio Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,181
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
                    if($nombreCategoria == "Sillas Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,180
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
                    if($nombreCategoria == "Motherboards Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,179
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
                    if($nombreCategoria == "Gabinetes Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,178
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
                    if($nombreCategoria == "Fuentes de Poder Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,177
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
                    if($nombreCategoria == "Kits de Teclado y Mouse Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,176,24,32,77
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
                    if($nombreCategoria == "Teclados Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,175
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
                    if($nombreCategoria == "Mouse Gaming" || $nombreCategoria == "Mouse Pads Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,174
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
                    if($nombreCategoria == "Diademas Gaming"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,50,59,173
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
                    if($nombreCategoria == "Hidrolavadoras"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,49,58,171
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
                    if($nombreCategoria == "Sensores" || $nombreCategoria == "Sensores para Vídeo Vigilancia"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,64,221,49,57,168
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
                    if($nombreCategoria == "Paneles para Alarma"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,64,220,49,57,167
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
                    if($nombreCategoria == "Acceso" || $nombreCategoria == "Accesorios para PCs" || $nombreCategoria == "Adaptadores USB" || $nombreCategoria == "Kits para Teclado y Mouse" || $nombreCategoria == "Seguridad Inteligente"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,64,215,49,57,166
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
                    if($nombreCategoria == "Cámara Inteligentes" || $nombreCategoria == "Cámaras Inteligentes"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,49,56,164
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
                    if($nombreCategoria == "Cerraduras" || $nombreCategoria == "Seguridad Inteligente" || $nombreCategoria == "Timbres"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,64,224,49,56,163
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
                    if($nombreCategoria == "Sensores Wifi"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,49,56,162
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
                    if($nombreCategoria == "Contactos Inteligentes Wifi" || $nombreCategoria == "Control Inteligente" || $nombreCategoria == "Iluminación" || $nombreCategoria == "Interruptores Wifi"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,49,56,160,159
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
                    if($nombreCategoria == "Control de Acceso"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,64,219,28,55,158
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
                    if($nombreCategoria == "Checadores" || $nombreCategoria == "Lector de Huella" || $nombreCategoria == "Reconocimiento Facial" || $nombreCategoria == "Tiempo y Asistencia"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,51,64,223,28,55,157
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
                    if($nombreCategoria == "Equipo" || $nombreCategoria == "Salud" || $nombreCategoria == "Termómetros"){
                        $items->setAttributeSetId(4);
                            $items->setName($product['nombre']."-".$product['clave']);
                            $items->setSku($product['clave']);
                            $items->setPrice($precioReal);
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
                                2,28,54,155
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
                    if($nombreCategoria == "Desinfectantes"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,54,154
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
                    if($nombreCategoria == "Caretas" || $nombreCategoria == "Cubrebocas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,54,153
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
                    if($nombreCategoria == "Aspiradoras"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,49,58,170,28,53,152
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
                    if($nombreCategoria == "Microondas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,49,58,172,28,53,151
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
                    if($nombreCategoria == "Aires Acondicionados"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,49,58,169,28,53,150
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
                    if($nombreCategoria == "Pantallas Profesionales"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,53,149
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
                    if($nombreCategoria == "Video Conferencia"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,53,148
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
                    if($nombreCategoria == "Análogos" || $nombreCategoria == "Central Telefónica" || $nombreCategoria == "Sistemas Análogos" || $nombreCategoria == "Telefonía para empresas" || $nombreCategoria == "Teléfonos Analógicos" || $nombreCategoria == "Teléfonos Digitales" || $nombreCategoria == "Teléfonos IP" || $nombreCategoria == "Teléfonos para Hogar" || $nombreCategoria == "Teléfonos SIP"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,53,147
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
                    if($nombreCategoria == "Escritorio de Oficina"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,53,146
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
                    if($nombreCategoria == "Ergonomia" || $nombreCategoria == "Sillas de Oficina"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,53,145
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
                    if($nombreCategoria == "Almacenamiento Óptico" || $nombreCategoria == "Contabilidad" || $nombreCategoria == "Quemadores DVD y BluRay"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,52,144
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
                    if($nombreCategoria == "Accesorios de Papeleria" || $nombreCategoria == "Articulos de Escritura" || $nombreCategoria == "Basico de Papeleria" || $nombreCategoria == "Cuadernos" || $nombreCategoria == "Papelería" || $nombreCategoria == "Plumas Interactivas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,52,143,142
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
                    if($nombreCategoria == "Mantenimiento"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,44,141
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
                    if($nombreCategoria == "Refacciones"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,44,140
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
                    if($nombreCategoria == "Cabezales"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,44,139
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
                    if($nombreCategoria == "Accesorios para impresoras" || $nombreCategoria == "Gabinetes para Impresoras"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,44,138
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
                    if($nombreCategoria == "Cintas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,43,143
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
                    if($nombreCategoria == "Papel"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,52,143,43,27,136
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
                    if($nombreCategoria == "Tóners"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,43,135
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
                    if($nombreCategoria == "Cartuchos"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,43,134
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
                    if($nombreCategoria == "Plotters"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,42,133
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
                    if($nombreCategoria == "Rotuladores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,42,132
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
                    if($nombreCategoria == "Escaner"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,42,131
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
                    if($nombreCategoria == "Multifuncionales"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,42,130
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
                    if($nombreCategoria == "Impresoras"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,27,42,129
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
                    if($nombreCategoria == "Soporte para TV" || $nombreCategoria == "Soporte Videowall" || $nombreCategoria == "Soportes"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,41,128
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
                    if($nombreCategoria == "Soporte para Proyector"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,41,127
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
                    if($nombreCategoria == "Limpieza"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,28,54,156,155,41,26,126
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
                    if($nombreCategoria == "Controles"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,41,125
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
                    if($nombreCategoria == "Accesorios para Camaras"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,40,124
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
                    if($nombreCategoria == "Lentes"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,40,123
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
                    if($nombreCategoria == "Micrófonos"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,39,121
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
                    if($nombreCategoria == "Home Theaters"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,39,120
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
                    if($nombreCategoria == "Bocina Portatil" || $nombreCategoria == "Bocinas" || $nombreCategoria == "Bocinas Gaming" || $nombreCategoria == "Bocinas y Bocinas Portátiles"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,49,56,161,26,39,119
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
                    if($nombreCategoria =="Audífonos para Apple" || $nombreCategoria == "Base Diademas" || $nombreCategoria == "Diademas" || $nombreCategoria == "Diademas y Audífonos"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,39,118,161,118
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
                    if($nombreCategoria =="Audífonos" || $nombreCategoria == "Audífonos para Apple" || $nombreCategoria == "Auriculares" || $nombreCategoria == "Earbuds" || $nombreCategoria == "In Ears" || $nombreCategoria == "On Ear" || $nombreCategoria == "on-ear" || $nombreCategoria == "Perifericos Apple" || $nombreCategoria == "Reproductores MP3"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,39,117
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
                    if($nombreCategoria == "Patinetas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,38,116
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
                    if($nombreCategoria == "Streaming" || $nombreCategoria == "Televisiones"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,38,115
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
                    if($nombreCategoria == "Pantallas de Proyección" || $nombreCategoria == "Proyectores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,38,114
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
                    if($nombreCategoria == "Power banks"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,38,113
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
                    if($nombreCategoria == "Smartwatch"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,38,112
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
                    if($nombreCategoria == "Cables Lightning" || $nombreCategoria == "Cargadores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,38,111
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
                    if($nombreCategoria == "Accesorios de Telefonía" || $nombreCategoria == "Accesorios para Celulares" || $nombreCategoria == "Bases" || $nombreCategoria == "Celulares" || $nombreCategoria == "Equipo para Celulares" || $nombreCategoria == "Transmisores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,38,110
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
                    if($nombreCategoria == "Gabinetes para Discos Duros"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,37,109
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
                    if($nombreCategoria == "Memorias Flash" || $nombreCategoria == "Memorias USB"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,37,108
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
                    if($nombreCategoria == "Adaptadores para Disco Duro" || $nombreCategoria == "Almacenamiento Externo" || $nombreCategoria == "Discos Duros" || $nombreCategoria == "Discos Duros Externos" || $nombreCategoria == "SSD"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,37,107,36,106
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
                    if($nombreCategoria == "Adaptadores Displayport" || $nombreCategoria == "Adaptadores DVI" || $nombreCategoria == "Adaptadores HDMI" || $nombreCategoria == "Adaptadores para Video" || $nombreCategoria == "Adaptadores Tipo C" || $nombreCategoria == "Adaptadores USB para Video" || $nombreCategoria == "Adaptadores VGA"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,36,105
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
                    if($nombreCategoria == "Cables Serial"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,36,101
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
                    if($nombreCategoria == "Cables Coaxial" || $nombreCategoria == "Cables de Video" || $nombreCategoria == "Cables Displayport" || $nombreCategoria == "Cables DVI" || $nombreCategoria == "Cables HDMI" || $nombreCategoria == "Cables KVM" || $nombreCategoria == "Cables VGA"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,36,103,100
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
                    if($nombreCategoria == "Cables de Audio" || $nombreCategoria == "Cables de Alimentación" || $nombreCategoria == "Cables de Energía"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,36,99,98
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
                    if($nombreCategoria == "Fundas y Maletines" || $nombreCategoria == "Mochila Gaming" || $nombreCategoria == "Mochilas y Maletines"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,26,40,122,25,35,95
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
                    if($nombreCategoria == "Fundas Laptops" || $nombreCategoria == "Fundas para Tablets" || $nombreCategoria == "Protectores para Tablets"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,35,94
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
                    if($nombreCategoria == "Filtro de Privacidad"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,35,93
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
                    if($nombreCategoria == "Concentradores Hub" || $nombreCategoria == "Docking Station"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,35,92
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
                    if($nombreCategoria == "Candados Laptops"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,35,91
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
                    if($nombreCategoria == "Bases Enfriadoras"){
                        $items->setAttributeSetId(4);
                            $items->setName($product['nombre']."-".$product['clave']);
                            $items->setSku($product['clave']);
                            $items->setPrice($precioReal);
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
                                2,25,35,90
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
                    if($nombreCategoria == "Accesorios para Laptops" || $nombreCategoria == "Adaptadores para Laptops" || $nombreCategoria == "Bases" || $nombreCategoria == "Baterias Laptops" || $nombreCategoria == "Pantallas Laptops" || $nombreCategoria == "Teclados Laptops"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,35,89
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
                    if($nombreCategoria == "Tarjetas de Sonido" || $nombreCategoria == "Tarjetas de Video" || $nombreCategoria == "Tarjetas Paralelas" || $nombreCategoria == "Tarjetas Seriales"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,34,88
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
                    if($nombreCategoria == "Motherboards"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,34,87
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
                    if($nombreCategoria == "Microprocesadores"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,34,86
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
                    if($nombreCategoria == "Memorias RAM"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,34,85
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
                    if($nombreCategoria == "Lectores de Memorias"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,34,84
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
                    if($nombreCategoria == "Gabinetes para Computadoras"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,34,83
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
                    if($nombreCategoria == "Fuentes de Poder"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,34,82
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
                    if($nombreCategoria == "Enfriamiento y Ventilación"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,34,81
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
                    if($nombreCategoria == "Webcams"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,35,97,24,33,80
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
                    if($nombreCategoria == "Bases" || $nombreCategoria == "Soporte de Monitor" || $nombreCategoria == "Soporte Laptops" || $nombreCategoria == "Soportes para PCs"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,25,35,96,24,33,79
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
                    if($nombreCategoria == "Monitores" || $nombreCategoria == "Monitores Curvos"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,33,78
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
                    if($nombreCategoria == "Teclados"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,32,76
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
                    if($nombreCategoria == "Mouse" || $nombreCategoria == "Mouse Pads"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,32,75
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
                    if($nombreCategoria == "iPad" ||$nombreCategoria == "Soporte para Tablets" || $nombreCategoria == "Tabletas"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,31,74
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
                    if($nombreCategoria == "Workstations de Escritorio" || $nombreCategoria == "Workstations Gaming" || $nombreCategoria == "Workstations Móviles"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,31,73
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
                    if($nombreCategoria == "Mini PC"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,31,72
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
                    if($nombreCategoria == "MacBook"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,31,71
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
                    if($nombreCategoria == "iMac"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,31,70
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
                    if($nombreCategoria == "PCs de Escritorio"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,31,69
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
                    if($nombreCategoria == "Laptops"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,31,68
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
                    if($nombreCategoria == "All In One"){
                        $items->setAttributeSetId(4);
                        $items->setName($product['nombre']."-".$product['clave']);
                        $items->setSku($product['clave']);
                        $items->setPrice($precioReal);
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
                            2,24,31,67
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
                }
            } catch (Exception $e) {
                $data = [];
            }           
        }
        else{
        }
        //INGRAM
       
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

    // public function getControllerUrl(){
    //     return $this->_urlBuilder->getUrl('syncproduct/products/importproducts');
    // }
}
