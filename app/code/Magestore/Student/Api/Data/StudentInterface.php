<?php


namespace Magestore\Student\Api\Data;

use Magento\Framework\Api\CustomAttributesDataInterface;

interface StudentInterface // define entity for service get for purposose hide implement of model resource model and DB
{
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     *
     * @return string|null
     */
    public function getClass();

    /**
     * Set class
     *
     * @param string $class
     * @return $this
     */
    public function setClass($class);

    /**
     *
     * @return string|null
     */
    public function getUniversity();

    /**
     * Set university
     *
     * @param string $university
     * @return $this
     */
    public function setUniversity($university);

}
