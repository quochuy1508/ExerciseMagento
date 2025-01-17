<?php
/**
 * Copyright © Devendra, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magestore\Test\Controller\Index;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * Index constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        echo "hello";

    }
}
