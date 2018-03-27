<?php

namespace app\controllers;


use ishop\App;
use ishop\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{
    public function indexAction()
    {
        $posts = R::findAll('test');
        $post = R::findOne('test', 'id = ?', [2]);

        $names = ['Yar', 'Ars', 'mike'];
        $cache = Cache::instance();
//        $cache->set('test', $names);
//        $cache->delete('test');
        $data = $cache->get('test');
        if (!$data) {
            $cache->set('test', $names);
        }

        debug($data);
//        debug($this->route);
//        echo 'adasd';
//        $this->set(['asda'=>'adad']);
//        $this->setMeta(['asda'=>'sadas']);
//        $this->setMeta(App::$app->getProperty('shop_name'), 'Главная', 'keywords');
//        $this->set(['name' => 'Yar', 'age' => 30]);
        $this->set(compact('posts', 'post'));
    }


}