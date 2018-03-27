<?php

namespace ishop;
use \RedBeanPHP\R as R;


class Db extends \RedBeanPHP\SimpleModel
{
    use TSingleton;

    protected function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['password']);
        if (!R::testConnection()) {
            throw new \Exception('нет соединения с БД', 500);
        }
        R::freeze(true);
        if (DEBUG) {
            R::debug(true, 1);
        }

    }
}