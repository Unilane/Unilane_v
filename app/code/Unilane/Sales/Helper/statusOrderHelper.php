<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unilane\Sales\Helper;

use Magento\Catalog\Api\Data\ProductInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\ResourceConnection;

/**
 * Adminhtml Catalog helper
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class statusOrderHelper 
{
    private $productFactory;
    private $productRepository;
    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context     
     */
    public function __construct(
        ProductInterfaceFactory $productFactory,
        ProductRepositoryInterface $productRepository
    ) {
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;

    }
    /**
     * Set Custom Attribute Tab Block Name for Category Edit
     *
     * @param string $attributeTabBlock
     * @return $this
     */
    public function statusOrder()
    {
        $_product = \Magento\Framework\App\ObjectManager::getInstance()->get(\Magento\Framework\Registry::class)->registry('product');
        $productId = $_product->getId();
        $resource = \Magento\Framework\App\ObjectManager::getInstance()->get(ResourceConnection::class);
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('icecat_product_attachment');
        $sql = "SELECT * FROM $tableName WHERE product_id = :valor";
        $params = ['valor' => $productId];
        $results = $connection->fetchAll($sql, $params);
    }
}
