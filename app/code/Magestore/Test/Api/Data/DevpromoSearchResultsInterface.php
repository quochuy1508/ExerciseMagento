<?php
/**
 * Copyright © Devendra, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magestore\Test\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;
/**
 * Interface DonationsSearchResultsInterface
 * @package Experius\DonationProduct\Api\Data
 */
interface DevpromoSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Magento\Framework\Api\ExtensibleDataInterface[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return SearchResultsInterface
     */
    public function setItems(array $items);
}
