<?php
namespace Magento\Sales\Api\Data;

/**
 * Extension class for @see \Magento\Sales\Api\Data\OrderInterface
 */
class OrderExtension extends \Magento\Framework\Api\AbstractSimpleObject implements OrderExtensionInterface
{
    /**
     * @return \Magento\Sales\Api\Data\ShippingAssignmentInterface[]|null
     */
    public function getShippingAssignments()
    {
        return $this->_get('shipping_assignments');
    }

    /**
     * @param \Magento\Sales\Api\Data\ShippingAssignmentInterface[] $shippingAssignments
     * @return $this
     */
    public function setShippingAssignments($shippingAssignments)
    {
        $this->setData('shipping_assignments', $shippingAssignments);
        return $this;
    }

    /**
     * @return \Magento\Payment\Api\Data\PaymentAdditionalInfoInterface[]|null
     */
    public function getPaymentAdditionalInfo()
    {
        return $this->_get('payment_additional_info');
    }

    /**
     * @param \Magento\Payment\Api\Data\PaymentAdditionalInfoInterface[] $paymentAdditionalInfo
     * @return $this
     */
    public function setPaymentAdditionalInfo($paymentAdditionalInfo)
    {
        $this->setData('payment_additional_info', $paymentAdditionalInfo);
        return $this;
    }

    /**
     * @return \Magento\GiftMessage\Api\Data\MessageInterface|null
     */
    public function getGiftMessage()
    {
        return $this->_get('gift_message');
    }

    /**
     * @param \Magento\GiftMessage\Api\Data\MessageInterface $giftMessage
     * @return $this
     */
    public function setGiftMessage(\Magento\GiftMessage\Api\Data\MessageInterface $giftMessage)
    {
        $this->setData('gift_message', $giftMessage);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPickupLocationCode()
    {
        return $this->_get('pickup_location_code');
    }

    /**
     * @param string $pickupLocationCode
     * @return $this
     */
    public function setPickupLocationCode($pickupLocationCode)
    {
        $this->setData('pickup_location_code', $pickupLocationCode);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNotificationSent()
    {
        return $this->_get('notification_sent');
    }

    /**
     * @param int $notificationSent
     * @return $this
     */
    public function setNotificationSent($notificationSent)
    {
        $this->setData('notification_sent', $notificationSent);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSendNotification()
    {
        return $this->_get('send_notification');
    }

    /**
     * @param int $sendNotification
     * @return $this
     */
    public function setSendNotification($sendNotification)
    {
        $this->setData('send_notification', $sendNotification);
        return $this;
    }

    /**
     * @return \Magento\Tax\Api\Data\OrderTaxDetailsAppliedTaxInterface[]|null
     */
    public function getAppliedTaxes()
    {
        return $this->_get('applied_taxes');
    }

    /**
     * @param \Magento\Tax\Api\Data\OrderTaxDetailsAppliedTaxInterface[] $appliedTaxes
     * @return $this
     */
    public function setAppliedTaxes($appliedTaxes)
    {
        $this->setData('applied_taxes', $appliedTaxes);
        return $this;
    }

    /**
     * @return \Magento\Tax\Api\Data\OrderTaxDetailsItemInterface[]|null
     */
    public function getItemAppliedTaxes()
    {
        return $this->_get('item_applied_taxes');
    }

    /**
     * @param \Magento\Tax\Api\Data\OrderTaxDetailsItemInterface[] $itemAppliedTaxes
     * @return $this
     */
    public function setItemAppliedTaxes($itemAppliedTaxes)
    {
        $this->setData('item_applied_taxes', $itemAppliedTaxes);
        return $this;
    }

    /**
     * @return boolean|null
     */
    public function getConvertingFromQuote()
    {
        return $this->_get('converting_from_quote');
    }

    /**
     * @param boolean $convertingFromQuote
     * @return $this
     */
    public function setConvertingFromQuote($convertingFromQuote)
    {
        $this->setData('converting_from_quote', $convertingFromQuote);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMpDeliveryDate()
    {
        return $this->_get('mp_delivery_date');
    }

    /**
     * @param string $mpDeliveryDate
     * @return $this
     */
    public function setMpDeliveryDate($mpDeliveryDate)
    {
        $this->setData('mp_delivery_date', $mpDeliveryDate);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMpDeliveryTime()
    {
        return $this->_get('mp_delivery_time');
    }

    /**
     * @param string $mpDeliveryTime
     * @return $this
     */
    public function setMpDeliveryTime($mpDeliveryTime)
    {
        $this->setData('mp_delivery_time', $mpDeliveryTime);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMpHouseSecurityCode()
    {
        return $this->_get('mp_house_security_code');
    }

    /**
     * @param string $mpHouseSecurityCode
     * @return $this
     */
    public function setMpHouseSecurityCode($mpHouseSecurityCode)
    {
        $this->setData('mp_house_security_code', $mpHouseSecurityCode);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMpDeliveryComment()
    {
        return $this->_get('mp_delivery_comment');
    }

    /**
     * @param string $mpDeliveryComment
     * @return $this
     */
    public function setMpDeliveryComment($mpDeliveryComment)
    {
        $this->setData('mp_delivery_comment', $mpDeliveryComment);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOscOrderComment()
    {
        return $this->_get('osc_order_comment');
    }

    /**
     * @param string $oscOrderComment
     * @return $this
     */
    public function setOscOrderComment($oscOrderComment)
    {
        $this->setData('osc_order_comment', $oscOrderComment);
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
}
