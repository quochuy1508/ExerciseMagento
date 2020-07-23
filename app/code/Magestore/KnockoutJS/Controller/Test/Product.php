<?php


namespace Magestore\KnockoutJS\Controller\Test;


use Magento\Catalog\Helper\Image;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Data\Form\FormKey;
use Magento\Store\Model\StoreManager;

class Product extends \Magento\Framework\App\Action\Action
{

    protected $productFactory;
    protected $imageHelper;
    protected $listProduct;
    protected $_storeManager;

    public function __construct(
        Context $context,
        FormKey $formKey,
        ProductFactory $productFactory,
        StoreManager $storeManager,
        Image $imageHelper
    )
    {
        $this->productFactory = $productFactory;
        $this->_storeManager = $storeManager;
        $this->imageHelper = $imageHelper;
        parent::__construct($context);
    }

    public function getCollection() {
        return $this->productFactory->create()
            ->getData();
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        if ($id = $this->getRequest()->getParam("id")) {
            echo "Id: ".$id."<br/>";
            $product = $this->productFactory->create()->getData();
            echo "<br/>Product: ";
            print_r($product);
//            $productData = [
//                'entity_id' => $product->getId(),
//                'name' => $product->getName(),
//                'price' => '$' . $product->getPrice(),
//                'src' => $this->imageHelper->init($product, 'product_base_image')->getUrl(),
//            ];
//            echo json_encode($productData);
//            return;
        } else {
            echo "No data";
        }
    }
}
