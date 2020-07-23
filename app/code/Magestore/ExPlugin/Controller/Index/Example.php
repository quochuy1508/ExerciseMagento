<?php


namespace Magestore\ExPlugin\Controller\Index;


use Magento\Framework\App\Action\Action;

class Example extends Action
{
    protected $title;

    public function execute()
    {
        echo $this->setTitle('Welcome')."<br/>";
        echo $this->getTitle()."<br/>";
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
