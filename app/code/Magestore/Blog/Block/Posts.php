<?php

namespace Magestore\Blog\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magestore\Blog\Model\ResourceModel\Post\Collection as PostCollection;
use \Magestore\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;
use \Magestore\Blog\Model\Post;

class Posts extends Template
{
    /**
     * CollectionFactory
     * @var null|PostCollectionFactory
     */
    protected $_postCollectionFactory = null;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PostCollectionFactory $postCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        PostCollectionFactory $postCollectionFactory,
        array $data = []
    ) {
        $this->_postCollectionFactory = $postCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return Post[]
     */
    public function getPosts()
    {
        /** @var PostCollection $postCollection */
        $postCollection = $this->_postCollectionFactory->create();
        $postCollection->addFieldToSelect('*')->load();
        return $postCollection->getItems();
    }

    /**
     * For a given post, returns it's url
     * @param Post $post
     * @return string
     */
    public function getPostUrl(
        Post $post
    ) {
        return '/blog/post/view/id/' . $post->getId();
    }

    public function helloWorld() {
        echo "Hello world";
    }
}
