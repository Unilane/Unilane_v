<?php
namespace Magento\Quote\Api\Data;

/**
 * ExtensionInterface class for @see \Magento\Quote\Api\Data\CartInterface
 */
interface CartExtensionInterface extends \Magento\Framework\Api\ExtensionAttributesInterface
{
    /**
     * @return \Magento\Quote\Api\Data\ShippingAssignmentInterface[]|null
     */
    public function getShippingAssignments();

    /**
     * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface[] $shippingAssignments
     * @return $this
     */
    public function setShippingAssignments($shippingAssignments);

    /**
     * @return float|null
     */
    public function getFinanceCostAmount();

    /**
     * @param float $financeCostAmount
     * @return $this
     */
    public function setFinanceCostAmount($financeCostAmount);

    /**
     * @return float|null
     */
    public function getBaseFinanceCostAmount();

    /**
     * @param float $baseFinanceCostAmount
     * @return $this
     */
    public function setBaseFinanceCostAmount($baseFinanceCostAmount);

    /**
     * @return float|null
     */
    public function getFirstCardAmount();

    /**
     * @param float $firstCardAmount
     * @return $this
     */
    public function setFirstCardAmount($firstCardAmount);

    /**
     * @return float|null
     */
    public function getSecondCardAmount();

    /**
     * @param float $secondCardAmount
     * @return $this
     */
    public function setSecondCardAmount($secondCardAmount);
}
