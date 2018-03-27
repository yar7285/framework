<?php

namespace app\controllers;

use app\models\AppModel;
use ishop\base\Controller;

class AppController extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);
        new AppModel();
    }

}