<?php


namespace ishop\base;


class View
{
    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->model = $route['controller'];
        $this->meta = $meta;

    }
}