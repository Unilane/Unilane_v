<?php
namespace Unilane\Formularios\Controller\Index\TeamIndex;

/**
 * Interceptor class for @see \Unilane\Formularios\Controller\Index\TeamIndex
 */
class Interceptor extends \Unilane\Formularios\Controller\Index\TeamIndex implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct()
    {
        $this->___init();
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }
}
