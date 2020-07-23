<?php


namespace Magestore\Student\Model\ResourceModel\Student;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magestore\Student\Model\Student as Model;
use Magestore\Student\Model\ResourceModel\Student as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
