<?php

namespace ishop\base;


abstract class Controller
{

    public $controller;
    public $prefix;
    public $layout;
    public $route;
    public $model;
    public $view;
    public $data = [];
    public $meta = ['title' => '', 'description' => '', 'keywords' => ''];

    public function __construct($router)
    {
        $this->route = $router;
        $this->controller = $router['controller'];
        $this->model = $router['controller'];
        $this->view = $router['action'];
        $this->prefix = $router['prefix'];
    }

    public function getView()
    {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }

}