<?php


namespace Magestore\Event\Observer;


use Magento\Framework\App\Action\Context;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session;

class LogoutCustomer implements ObserverInterface
{
    protected $customerSession;
    protected $redirect;

    public function __construct(
        Context $context,
        Session $customerSession
    ) {
        $this->redirect = $context->getRedirect();
        $this->customerSession = $customerSession;
    }


    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        $customerId = $this->customerSession->getCustomer()->getId();
        if($customerId) {
//            echo "Logout thanh cong";
            $this->customerSession->destroy();
//            return "Customer logout successfully";
        } else {
//            return "Customer is not login";
        }

    }
}
