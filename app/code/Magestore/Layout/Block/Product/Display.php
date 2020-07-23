<?php

namespace Magestore\Layout\Block\Product;
use Magento\Framework\Registry;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Display extends Template
{
    protected $_registry;
    protected $_categoryFactory;
    public function __construct(
        Context $context,
        CategoryFactory $categoryFactory,
        Registry $registry
    )
    {
        $this->_registry = $registry;
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context);
    }

    public function getCurrentProduct() {
        return $this->_registry->registry('current_product');
    }

    public function getCurrentCategory($categoryId)
    {
        $category = $this->_categoryFactory->create()->load($categoryId);
        return $category->getName();

    }

    public function sayHello()
    {
        return __('Hello World');
    }
}
