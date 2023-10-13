<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Unilane\Sales\Plugin\Magento\Sales\Api;

use Magento\Sales\Api\OrderManagementInterface;
use Magento\Sales\Api\Data\OrderInterface;

class IntegrationIntelisis
{
    /**
    * @var OrderInterface 
    */
    private $OrderInterface;
    /**
    * @var OrderManagementInterface 
    */
    private $OrderManagementInterface;
    
    public function __construct(
        OrderInterface $OrderInterface,
        OrderManagementInterface $OrderManagementInterface
    ) 
    {
        $this->OrderManagementInterface = $OrderManagementInterface;
        $this->OrderInterface           = $OrderInterface;
    }
    public function afterPlace(OrderManagementInterface $subject, OrderInterface $order)
    {           
        // Este codigo colecciona toda la informacion del cliente como su nombre y direccion
        $infoCliente = $order->getAddresses();
        $datosDomicilio = [];        
        foreach($infoCliente as $cliente){            
            $data["calle"]      =  $cliente->getStreet();
            $data["delagacion"] =  $cliente->getRegion();
            $data["estado"]     =  $cliente->getCity();
            $data["pais"]       =  "Mexico";
            $data["cp"]         =  $cliente->getPostCode();
            $data["nombre"]     =  $order->getCustomerFirstname()." ".$order->getCustomerLastname(); 
            $data["bandera"]    =  $cliente->getAddressType();
            array_push($datosDomicilio, $data);            
        }
        if($datosDomicilio){
            $result = $this->connectionAPI($datosDomicilio);
        }
        if($result){
            // Este codigo colecciona toda la informacion del pedido que requiere intelisis
            $pedidos = $order->getItems();
            $datosPedido = [];
            foreach($pedidos as $pedido){
                $dataP["sku"]      = $pedido->getSku();
                $dataP["qty"]      = $pedido->getQtyOrdered();
                $dataP["tax"]      = $pedido->getTaxPercent() == 0 ? null : $pedido->getTaxPercent();
                $dataP["discount"] = $pedido->getDiscountPercent() == 0 ? null : $pedido->getDiscountPercent();
                $dataP["price"]    = $pedido->getPrice() == 0 ? $pedido->getOriginalPrice() : $pedido->getPrice();
                array_push($datosPedido, $dataP);
            }
            if($datosPedido){
                $resultP = $this->connectionAPI($datosPedido);
            }
            if($resultP){
                return $order;
            }        
        }        
    }

    public function connectionAPI($dataI){
        // URL de la API a la que te deseas conectar
        $url = 'http://localhost/API/index.php';
        // Datos que deseas enviar (por ejemplo, en formato JSON)
        $data = array(
            'datos' => $dataI
        );
        $data_string = json_encode($data);
        // Inicializar cURL
        $ch = curl_init($url);
        // Configurar la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // Puedes cambiar "POST" a otros métodos como "GET" o "PUT".
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
        // Ejecutar la petición
        $result = curl_exec($ch);
        // Verificar si hubo errores
        if (curl_errno($ch)) {
            $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/errorURL.log');
            $logger = new \Zend_Log();
            $logger->addWriter($writer);
            $logger->info(curl_error($ch));
        }
        // Cerrar la conexión cURL
        curl_close($ch);
        // Procesar la respuesta (puede ser JSON, XML, HTML, etc.)
        if ($result) {
            $response = json_decode($result, true);
            if($response['estado']){
                return $response['estado'];
            }
            else{
                return false;
            }
        } else {
            echo 'No se recibió una respuesta válida.';
        }
    }
}
