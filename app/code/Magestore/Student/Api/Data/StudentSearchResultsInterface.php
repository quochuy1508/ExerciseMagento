<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magestore\Student\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for customer address search results.
 * @api
 * @since 100.0.2
 */
interface StudentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get customer addresses list.
     *
     * @return StudentInterface[]
     */
    public function getItems();

    /**
     * Set customer addresses list.
     *
     * @param StudentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
