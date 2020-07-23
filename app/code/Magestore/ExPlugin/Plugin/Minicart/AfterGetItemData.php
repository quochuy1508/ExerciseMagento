<?php


namespace Magestore\ExPlugin\Plugin\Minicart;
use Magento\Checkout\CustomerData\AbstractItem;


class AfterGetItemData
{
    public function __construct()
    {
    }

    public function afterGetItemData(AbstractItem $item, $result) {
        try {
            if ($result["product_id"] > 0) {
                $image  = "https://2xjk0811vl4g2goo9j3wnndg-wpengine.netdna-ssl.com/wp-content/uploads/2020/04/Magestore_Logo_Black.svg";
                $result['product_image']['src'] = $image;
            }
        } catch (\Exception $e) {
            echo $e;
        }
        return $result;
    }
}
