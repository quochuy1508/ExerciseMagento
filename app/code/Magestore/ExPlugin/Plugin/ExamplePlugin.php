<?php


namespace Magestore\ExPlugin\Plugin;


use Magestore\ExPlugin\Controller\Index\Example;

class ExamplePlugin
{
    public function beforeSetTitle(Example $subject, $title)
    {
        $title = $title . " to ";
        echo __METHOD__ . "</br>";

        return [$title];
    }


    public function afterGetTitle(Example $subject, $result)
    {

        echo __METHOD__ . "</br>";

        return '<h1>'. $result . 'Magestore.com' .'</h1>';

    }


    public function aroundGetTitle(Example $subject, callable $proceed)
    {

        echo __METHOD__ . " - Before proceed() </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed() </br>";


        return $result;
    }
}
