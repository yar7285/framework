<?php

namespace ishop;


class ErrorHandler
{
    public function __construct()
    {
        if(DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(1);
        }
        set_exception_handler([$this, 'exeptionHandler']); //
    }

    public function exeptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->dispalyError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    public function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибкы: {$message} 
        | Файл: {$file} | Строка: {$line}\n===================\n", 3, ROOT . '/tmp/errors.log');
    }

    public function dispalyError($errno, $errstr, $errfile, $errline, $responce = 404)
    {
        http_response_code($responce);
        if ($responce == 404 && !DEBUG) {
            require WWW . '/errors/404.php';
            die;
        }
        if (DEBUG) {
            require WWW . '/errors/dev.php';
        } else {
            require WWW . '/errors/prod.php';
        }
        die;
    }

}