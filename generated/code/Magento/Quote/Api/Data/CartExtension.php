<?php
namespace Magento\Quote\Api\Data;

/**
 * Extension class for @see \Magento\Quote\Api\Data\CartInterface
 */
class CartExtension extends \Magento\Framework\Api\AbstractSimpleObject implements CartExtensionInterface
{
    /**
     * @return \Magento\Quote\Api\Data\ShippingAssignmentInterface[]|null
     */
    public function getShippingAssignments()
    {
        return $this->_get('shipping_assignments');
    }

    /**
     * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface[] $shippingAssignments
     * @return $this
     */
    public function setShippingAssignments($shippingAssignments)
    {
        $this->setData('shipping_assignments', $shippingAssignments);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getFinanceCostAmount()
    {
        return $this->_get('finance_cost_amount');
    }

    /**
     * @param float $financeCostAmount
     * @return $this
     */
    public function setFinanceCostAmount($financeCostAmount)
    {
        $this->setData('finance_cost_amount', $financeCostAmount);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getBaseFinanceCostAmount()
    {
        return $this->_get('base_finance_cost_amount');
    }

    /**
     * @param float $baseFinanceCostAmount
     * @return $this
     */
    public function setBaseFinanceCostAmount($baseFinanceCostAmount)
    {
        $this->setData('base_finance_cost_amount', $baseFinanceCostAmount);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getFirstCardAmount()
    {
        return $this->_get('first_card_amount');
    }

    /**
     * @param float $firstCardAmount
     * @return $this
     */
    public function setFirstCardAmount($firstCardAmount)
    {
        $this->setData('first_card_amount', $firstCardAmount);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getSecondCardAmount()
    {
        return $this->_get('second_card_amount');
    }

    /**
     * @param float $secondCardAmount
     * @return $this
     */
    public function setSecondCardAmount($secondCardAmount)
    {
        $this->setData('second_card_amount', $secondCardAmount);
        return $this;
    }
}
