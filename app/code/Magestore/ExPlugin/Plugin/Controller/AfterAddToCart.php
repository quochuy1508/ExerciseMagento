<?php


namespace Magestore\ExPlugin\Plugin\Controller;


use Magento\Checkout\Controller\Cart\Add;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\UrlInterface;

class AfterAddToCart
{
    /**
     * @var ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * @var RedirectFactory
     */
    protected $resultRedirectFactory;

    /**
     * @var UrlInterface
     */
    protected $url;

    protected $request;


    public function __construct(
        ObjectManagerInterface $objectManager,
        RedirectFactory $resultRedirectFactory,
        UrlInterface $url,
        Http $request
    )
    {
        $this->objectManager = $objectManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->url = $url;
        $this->request = $request;
    }

    public function aroundExecute(Add $subject, \Closure $proceed) {
        $returnValue = $proceed();
        // check xem add to cart la ajax hay la goi truc tiep url
        if (!$this->request->isAjax()) {
            $checkoutUrl = $this->url->getUrl('checkout/cart');
            $returnValue->setUrl($checkoutUrl);
            $returnValue =  $this->resultRedirectFactory->create()->setPath($checkoutUrl, ['_current' => true]);
        }
        return $returnValue;
    }
}
