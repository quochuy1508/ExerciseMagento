<?php


namespace Magestore\ServiceContractApi\Api\Data;


interface StudentInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID = 'id';
    const NAME = 'name';
    const CLASSSTUDENT = 'classStudent';
    const UNIVERSITY = 'university';
    /**#@-*/

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
     * Get last name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set last name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get last name
     *
     * @return string|null
     */
    public function getClassStudent();

    /**
     * Set last name
     *
     * @param string $classStudent
     * @return $this
     */
    public function setClassStudent($classStudent);

    /**
     * Get last name
     *
     * @return string|null
     */
    public function getUniversity();

    /**
     * Set last name
     *
     * @param string $university
     * @return $this
     */
    public function setUniversity($university);

}
