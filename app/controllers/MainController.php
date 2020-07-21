<?php


namespace app\controllers;



class MainController extends AppController
{



    public function indexAction()
    {
        $this->setMeta('Заголовок', 'Вот такой вот текст', '');
        echo __METHOD__;
    }
}