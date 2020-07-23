<?php


namespace Magestore\ExPlugin\Helper;


use Magento\Framework\App\ObjectManager;

class Image extends \Magento\Catalog\Helper\Image
{
    /**
     * Retrieve image URL
     *
     * @return string
     */
    public function getUrl()
    {
        $objectManager = ObjectManager::getInstance();
        $requestInterface = $objectManager->get('Magento\Framework\App\RequestInterface');
        $moduleName     = $requestInterface->getModuleName();
        $controllerName = $requestInterface->getControllerName();
        $actionName     = $requestInterface->getActionName();
        $current_page = $moduleName.'_'.$controllerName.'_'.$actionName;
        if ($current_page == 'checkout_index_index') {
            return "https://2xjk0811vl4g2goo9j3wnndg-wpengine.netdna-ssl.com/wp-content/uploads/2020/04/Magestore_Logo_Black.svg";
        } else {
            try {
                $this->applyScheduledActions();
                return $this->_getModel()->getUrl();
            } catch (\Exception $e) {
                return $this->getDefaultPlaceholderUrl();
            }
        }

    }
}
