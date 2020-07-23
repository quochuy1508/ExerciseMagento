<?php


namespace Magestore\Student\Api;


use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magestore\Student\Api\Data\StudentInterface;
use Magestore\Student\Api\Data\StudentSearchResultsInterface;

interface StudentRepositoryInterface
{
    /**
     * @param int $id
     * @return StudentInterface
     * @throws NoSuchEntityException
     */
    public function getById($id);

    /**
     * Save customer address.
     *
     * @param StudentInterface $student
     * @return StudentInterface
     * @throws LocalizedException
     */
    public function save(StudentInterface $student);


    /**
     * Retrieve customers addresses matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return StudentSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete customer address.
     *
     * @param StudentInterface $student
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(StudentInterface $student);


}
