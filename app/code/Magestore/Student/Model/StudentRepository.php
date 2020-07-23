<?php


namespace Magestore\Student\Model;

use Magento\Framework\Api\SortOrder;
use Exception;
use Magento\Framework\Exception\LocalizedException;
use Magestore\Student\Api\Data\StudentInterface;
use Magestore\Student\Api\Data\StudentInterfaceFactory;
use Magestore\Student\Api\Data\StudentSearchResultsInterfaceFactory;
use Magestore\Student\Api\StudentRepositoryInterface;
use Magestore\Student\Model\StudentFactory;
use Magestore\Student\Model\ResourceModel\Student\Collection;
use Magestore\Student\Model\ResourceModel\Student as ResourceStudent;
use Magestore\Student\Model\ResourceModel\Student\CollectionFactory as StudentCollectionFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

class StudentRepository implements StudentRepositoryInterface
{
    /**
     * @var ResourceStudent
     */
    protected $resource;

    /**
     * @var StudentCollectionFactory
     */
    protected $studentCollectionFactory;

    /**
     * @var StudentSearchResultsInterfaceFactory
     */
    protected $studentSearchResultsInterfaceFactory;

    /**
     * @var StudentInterfaceFactory
     */
    protected $studentInterfaceFactory;

    protected $studentFactory;


    /**
     * @param ResourceStudent $resource
     * @param StudentCollectionFactory $studentCollectionFactory
     * @param StudentSearchResultsInterfaceFactory $studentSearchResultsInterfaceFactory
     * @param StudentInterfaceFactory $studentInterfaceFactory
     * @param StudentFactory $studentFactory
     */
    public function __construct(
        ResourceStudent $resource,
        StudentCollectionFactory $studentCollectionFactory,
        StudentSearchResultsInterfaceFactory $studentSearchResultsInterfaceFactory,
        StudentInterfaceFactory $studentInterfaceFactory,
        StudentFactory $studentFactory
    ) {
        $this->resource = $resource;
        $this->studentCollectionFactory = $studentCollectionFactory;
        $this->studentSearchResultsInterfaceFactory = $studentSearchResultsInterfaceFactory;
        $this->studentInterfaceFactory = $studentInterfaceFactory;
        $this->studentFactory = $studentFactory;
    }

    /**
     * Save customer address.
     *
     * @param StudentInterface $student
     * @return StudentInterface
     * @throws CouldNotSaveException
     */
    public function save(StudentInterface $student)
    {

        try {
            $this->resource->save($student);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the data: %1',
                $exception->getMessage()
            ));
        };
        return $student;
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->studentCollectionFactory->create()->load();

//
        $this->addFilterToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
//
//        $collection->getSelect()->assemble();
//        $collection->getSelect()->__toString();
//        echo $collection->getSelect();
        return $collection->getData();
//        $collection->load();
//        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFilterToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection) {
//        print_r($collection->getData());
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {

            $filters = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $filters[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
//            print_r($filters);
//            print_r($conditions);
            $collection->addFieldToFilter($filters, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->studentSearchResultsInterfaceFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function delete(StudentInterface $student)
    {
        $this->resource->delete($student);
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function getById($id)
    {
        $student = $this->studentFactory->create();
        $this->resource->load($student, $id);

        if (!$student->getData("id")) {
            throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
        }

        return (object)$student;

    }
}
