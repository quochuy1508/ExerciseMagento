<?php


namespace Magestore\Event\Observer;
use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class DiscountCart implements ObserverInterface
{

    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        $item = $observer->getEvent()->getData('quote_item');

        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );

        $price = $item->getPrice() / 2; //set your price here
        $item->setCustomPrice($price);
        $item->setOriginalCustomPrice($price);
        $item->getProduct()->setIsSuperMode(true);
    }
}
