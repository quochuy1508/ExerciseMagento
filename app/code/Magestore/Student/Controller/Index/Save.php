<?php
/**
 * Copyright © Devendra, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magestore\Student\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magestore\Student\Api\Data\StudentInterface as ModelFactory;
use Magestore\Student\Api\StudentRepositoryInterface as ModelRepositoryInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Save extends Action
{
    /**
     * @var ModelRepositoryInterface
     */
    private $modelRepositoryInterface;

    /**
     * Index resultPageFactory
     * @var PageFactory
     */
    private $resultPageFactory;
    /**
     * @var
     */
    private $modelFactory;

    /**
     * Save constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ModelFactory $modelFactory
     * @param ModelRepositoryInterface $modelRepositoryInterface
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ModelFactory $modelFactory,
        ModelRepositoryInterface $modelRepositoryInterface
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->modelFactory = $modelFactory;
        $this->modelRepositoryInterface = $modelRepositoryInterface;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @throws \Magento\Framework\Exception\InputException
     */
    public function execute()
    {

        $data = [
            "name" => "Ho Quoc Huy",
            "class" => "KHMT-K62",
            "university" => "BKHN"
        ];
        $objData = $this->modelFactory->addData($data);

        try{
            $data = $this->modelRepositoryInterface->save($objData); // Service Contract
            echo $data->getName() . " Data saved with ";
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}
