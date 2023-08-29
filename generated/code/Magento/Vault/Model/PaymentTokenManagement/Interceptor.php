<?php
namespace Magento\Vault\Model\PaymentTokenManagement;

/**
 * Interceptor class for @see \Magento\Vault\Model\PaymentTokenManagement
 */
class Interceptor extends \Magento\Vault\Model\PaymentTokenManagement implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Vault\Api\PaymentTokenRepositoryInterface $repository, \Magento\Vault\Model\ResourceModel\PaymentToken $paymentTokenResourceModel, \Magento\Vault\Model\PaymentTokenFactory $paymentTokenFactory, \Magento\Framework\Api\FilterBuilder $filterBuilder, \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder, \Magento\Vault\Api\Data\PaymentTokenSearchResultsInterfaceFactory $searchResultsFactory, \Magento\Framework\Encryption\EncryptorInterface $encryptor, \Magento\Framework\Intl\DateTimeFactory $dateTimeFactory)
    {
        $this->___init();
        parent::__construct($repository, $paymentTokenResourceModel, $paymentTokenFactory, $filterBuilder, $searchCriteriaBuilder, $searchResultsFactory, $encryptor, $dateTimeFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getListByCustomerId($customerId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getListByCustomerId');
        return $pluginInfo ? $this->___callPlugins('getListByCustomerId', func_get_args(), $pluginInfo) : parent::getListByCustomerId($customerId);
    }

    /**
     * {@inheritdoc}
     */
    public function getVisibleAvailableTokens($customerId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getVisibleAvailableTokens');
        return $pluginInfo ? $this->___callPlugins('getVisibleAvailableTokens', func_get_args(), $pluginInfo) : parent::getVisibleAvailableTokens($customerId);
    }

    /**
     * {@inheritdoc}
     */
    public function getByPaymentId($paymentId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getByPaymentId');
        return $pluginInfo ? $this->___callPlugins('getByPaymentId', func_get_args(), $pluginInfo) : parent::getByPaymentId($paymentId);
    }

    /**
     * {@inheritdoc}
     */
    public function getByGatewayToken($token, $paymentMethodCode, $customerId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getByGatewayToken');
        return $pluginInfo ? $this->___callPlugins('getByGatewayToken', func_get_args(), $pluginInfo) : parent::getByGatewayToken($token, $paymentMethodCode, $customerId);
    }

    /**
     * {@inheritdoc}
     */
    public function getByPublicHash($hash, $customerId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getByPublicHash');
        return $pluginInfo ? $this->___callPlugins('getByPublicHash', func_get_args(), $pluginInfo) : parent::getByPublicHash($hash, $customerId);
    }

    /**
     * {@inheritdoc}
     */
    public function saveTokenWithPaymentLink(\Magento\Vault\Api\Data\PaymentTokenInterface $token, \Magento\Sales\Api\Data\OrderPaymentInterface $payment)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'saveTokenWithPaymentLink');
        return $pluginInfo ? $this->___callPlugins('saveTokenWithPaymentLink', func_get_args(), $pluginInfo) : parent::saveTokenWithPaymentLink($token, $payment);
    }

    /**
     * {@inheritdoc}
     */
    public function addLinkToOrderPayment($paymentTokenId, $orderPaymentId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addLinkToOrderPayment');
        return $pluginInfo ? $this->___callPlugins('addLinkToOrderPayment', func_get_args(), $pluginInfo) : parent::addLinkToOrderPayment($paymentTokenId, $orderPaymentId);
    }
}
