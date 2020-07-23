<?php


namespace Magestore\Student\Model;


use Magento\Framework\Model\AbstractModel;
use Magestore\Student\Api\Data\StudentInterface;
use Magestore\Student\Model\ResourceModel\Student as ResourceModel;

class Student extends AbstractModel implements StudentInterface
{
    /**
     * Construct
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->getData("id");
    }

    /**
     * @inheritDoc
     */
    public function setId($id = null)
    {
        $this->setData("id", $id);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData("name");
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        $this->setData("name", $name);
    }

    /**
     * @inheritDoc
     */
    public function getClass()
    {
        return $this->getData("class");
    }

    /**
     * @inheritDoc
     */
    public function setClass($class)
    {
        $this->setData("class", $class);
    }

    /**
     * @inheritDoc
     */
    public function getUniversity()
    {
        return $this->getData("university");
    }

    /**
     * @inheritDoc
     */
    public function setUniversity($university)
    {
        $this->setData("university", $university);
    }
}
