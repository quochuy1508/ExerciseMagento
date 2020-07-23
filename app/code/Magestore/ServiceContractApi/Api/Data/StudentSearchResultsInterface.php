<?php


namespace Magestore\ServiceContractApi\Api\Data;

interface StudentSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get customer addresses list.
     *
     * @return \Magestore\ServiceContractApi\Api\Data\StudentInterface[]
     */
    public function getItems();

    /**
     * Set customer addresses list.
     *
     * @param \Magestore\ServiceContractApi\Api\Data\StudentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
