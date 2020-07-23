<?php


namespace Magestore\ServiceContractApi\Api;


use Magento\Framework\Api\SearchCriteriaInterface;
use Magestore\ServiceContractApi\Api\Data\StudentInterface;

interface StudentRepositoryInterface
{
    /**
     * @param int $id
     * @return \Magestore\ServiceContractApi\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Magestore\ServiceContractApi\Api\Data\StudentInterface $student
     * @return \Magestore\ServiceContractApi\Api\Data\StudentInterface
     */
    public function save(StudentInterface $student);

    /**
     * @param \Magestore\ServiceContractApi\Api\Data\StudentInterface $student
     * @return void
     */
    public function delete(StudentInterface $student);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magestore\ServiceContractApi\Api\Data\StudentSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
