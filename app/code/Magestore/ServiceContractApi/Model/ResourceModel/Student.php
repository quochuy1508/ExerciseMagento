<?php


namespace Magestore\ServiceContractApi\Model\ResourceModel;


class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('magestore_service_contractApi', 'id');

    }
}
