<?php

namespace ishop\base;


class View
{
    public $controller;
    public $prefix;
    public $layout;
    public $route;
    public $model;
    public $view;
    public $data = [];
    public $meta = [];

    public function __construct($router, $layuot = '', $view = '', $meta)
    {
        $this->route = $router;
        $this->controller = $router['controller'];
        $this->model = $router['controller'];
        $this->view = $view;
        $this->prefix = $router['prefix'];
        $this->meta = $meta;
        if ($layuot === false) {
            $this->layout = false;
        } else {
            $this->layout = $layuot ?: LAYOUT;
        }
    }

    public function render($data)
    {
        if (is_array($data)) extract($data);
//           var_dump($data);
       $viewFile = APP . "/views/{$this->prefix}/{$this->controller}/{$this->view}.php";
       if (is_file($viewFile)) {
           ob_start();
           require_once $viewFile;
           $content = ob_get_clean();
       } else {
           throw new \Exception("Не найден вид {$viewFile}", 500);
       }

       if (false !== $this->layout) {
           $layoutFile = APP . "/views/layouts/{$this->layout}.php";
           if (is_file($layoutFile)) {
               require_once $layoutFile;
           } else {
               throw new \Exception("Не найден шаблон {$this->layout}", 500);
           }
       }

    }

    public function getMeta()
    {
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . $this->meta['description'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        return $output;
    }

}