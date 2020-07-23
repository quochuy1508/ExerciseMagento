<?php


namespace Magestore\ServiceContractApi\Model;


use Magento\Framework\Model\AbstractModel;
use Magestore\ServiceContractApi\Api\Data\StudentInterface;

class Student extends AbstractModel implements StudentInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Student::class);
    }


    /**
     * @inheritDoc
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->_getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function setId($id)
    {
        // TODO: Implement setId() method.
        $this->setData(self::ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->_getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
        $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getClassStudent()
    {
        // TODO: Implement getClassStudent() method.
        return $this->_getData(self::CLASSSTUDENT);
    }

    /**
     * @inheritDoc
     */
    public function setClassStudent($classStudent)
    {
        // TODO: Implement setClassStudent() method.
        $this->setData(self::CLASSSTUDENT, $classStudent);
    }

    /**
     * @inheritDoc
     */
    public function getUniversity()
    {
        // TODO: Implement getUniversity() method.
        return $this->_getData(self::UNIVERSITY);
    }

    /**
     * @inheritDoc
     */
    public function setUniversity($university)
    {
        // TODO: Implement setUniversity() method.
        $this->setData(self::UNIVERSITY, $university);
    }
}
