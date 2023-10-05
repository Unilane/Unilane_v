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
        $this->OrderInterface = $OrderInterface;
    }
    public function afterPlace(OrderManagementInterface $subject, OrderInterface $order)
    {           
        echo $orden;
    }
}
