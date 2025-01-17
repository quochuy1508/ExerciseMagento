<?php
/**
 * Copyright © Devendra, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magestore\Test\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class DevpromoRepository implements \Magestore\Test\Api\DevpromoRepositoryInterface
{
    /**
     * @var DevpromoFactory
     */
    private $devpromoFactory;
    /**
     * @var ResourceModel\Devpromo\CollectionFactory
     */
    private $devpromoCollectionFactory;
    /**
     * @var DonationsSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * DevpromoRepository constructor.
     * @param DevpromoFactory $devPromoFactory
     * @param ResourceModel\Devpromo\CollectionFactory $collectionFactory
     * @param \Magestore\Test\Api\Data\DevpromoSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        \Magestore\Test\Model\DevpromoFactory $devPromoFactory,
        \Magestore\Test\Model\ResourceModel\Devpromo\CollectionFactory $collectionFactory,
        \Magestore\Test\Api\Data\DevpromoSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->devpromoFactory = $devPromoFactory;
        $this->devpromoCollectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Magestore\Test\Api\Data\DevpromoInterface $devpromo)
    {
        try {
            $devpromo->getResource()->save($devpromo);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the Record: %1',
                $exception->getMessage()
            ));
        }
        return $devpromo;
    }
    /**
     * {@inheritdoc}
     */
    public function getById($labelId)
    {
        $devPromoModel = $this->devpromoFactory->create();
        $devPromoModel->getResource()->load($devPromoModel, $labelId);
        if (!$devPromoModel->getId()) {
            throw new NoSuchEntityException(__('Record with id "%1" does not exist.', $labelId));
        }
        return $devPromoModel;
    }
    /**
     * {@inheritdoc}
     */
    public function delete(\Magestore\Test\Api\Data\DevpromoInterface $devpromo)
    {
        try {
            $devpromo->getResource()->delete($devpromo);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Donations: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }
    /**
     * {@inheritdoc}
     */
    public function deleteById($labelId)
    {
        return $this->delete($this->getById($labelId));
    }

    /**
     * {@inheritDoc}
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->devpromoCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getData());
        return $searchResults;
    }
}
