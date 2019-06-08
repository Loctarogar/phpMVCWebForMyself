<?php


namespace vendor\projectFiles\core;

ini_set('display_errors', 1);

class ErrorHandler
{
    public function __construct()
    {
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }

        // вказуемо функцію для обробки помилок
        set_error_handler([$this, "errorHandler"]);
        ob_start();
        set_exception_handler([$this, "exceptionHandler"]);
        register_shutdown_function([$this, "fatalErrorHandler"]);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline){
        $this->logErrors($errstr, $errfile, $errline);
        if(DEBUG || in_array($errno, [E_USER_ERROR, E_RECOVERABLE_ERROR])){
            $this->displayError($errno, $errstr, $errfile, $errline);
        }
        return true;
    }

    public function fatalErrorHandler(){
        $error = error_get_last();
        $this->logErrors($error['message'], $error['file'], $error['file']);
        //error_log("[".date('Y-m-d H:i:s')."] Error text: {$error['message']} | file: {$error['file']} | Line: {$error['file']}\n=Next Error=\n", 3, __DIR__.'/errors.log');
        if( !empty($error) AND $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR) ){
            $this->logErrors($error['message'], $error['file'], $error['file']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        }else{
            ob_end_flush();
        }
    }

    public function exceptionHandler($e){
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        //error_log("[".date('Y-m-d H:i:s')."] Error text: {$e->getMessage()} | file: {$e->getFile()} | Line: {$e->getLine()}\n=Next Error=\n", 3, __DIR__.'/errors.log');
        $this->displayError("Exception", $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file= '', $line = ''){
        error_log("[".date('Y-m-d H:i:s')."] Error text: {$message} | file: {$file} | Line: {$line}\n=Next Error=\n", 3, ROOT.'/tmp/errors.log');
        //chmod(ROOT.'/tmp/errors.log', 0777);
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500){
        http_response_code($response);
        if($response == 404 && !DEBUG){
            require WWW . '/errorsPages/404.html';
            die;
        }

        if(DEBUG){
            require WWW . '/errorsPages/dev.php';
        }else{
            require WWW . '/errorsPages/prod';
        }
        die;
    }
}
