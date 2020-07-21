<?php


namespace ishop;


class ErrorHandler
{

    public function __construct()
    {
        if (DEBUG){
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }


    /**
     * @param $e
     */
    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }


    /**
     * @param string $message
     * @param string $file
     * @param string $line
     */
    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | 
        Файл: {$file} | Строка: {$line}\n================\n", 3, ROOT . '/tmp/errors.log');
    }


    /**
     * @param $errNumber
     * @param $errMessage
     * @param $errFile
     * @param $errLine
     * @param int $responce
     */
    protected function displayError($errNumber, $errMessage, $errFile, $errLine, $responce = 404)
    {
        http_response_code($responce);
        if ($responce == 404 && !DEBUG){
            require_once WWW . '/errors/404.php';
            die;
        }
        if (DEBUG){
            require_once WWW . '/errors/dev.php';
        } else {
            require_once WWW . '/errors/prod.php';
        }
        die;
    }
}