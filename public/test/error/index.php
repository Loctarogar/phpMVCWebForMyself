<?php

/*
 *
 *
 */

// this CONST has value 1 to show all errors. so called development mod
// i can change it to 0, to suppress errors. production mod
ini_set('display_errors', 1);
define("DEBUG", 1);

class ErrorHandler{
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
        register_shutdown_function([$this, "fatalErrorHandler"]);
        set_exception_handler([$this, "exceptionHandler"]);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline){
        error_log("[".date('Y-m-d H:i:s')."] Error text: {$errstr} | file: {$errfile} | Line: {$errline}\n=Next Error=\n", 3, __DIR__.'/errors.log');
        $this->displayError($errno, $errstr, $errfile, $errline);
        return true;
    }

    public function fatalErrorHandler(){
        $error = error_get_last();
        error_log("[".date('Y-m-d H:i:s')."] Error text: {$error['message']} | file: {$error['file']} | Line: {$error['line']}\n=Next Error=\n", 3, __DIR__.'/errors.log');
        if( !empty($error) AND $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR) ){
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        }else{
            ob_end_flush();
        }
    }

    public function exceptionHandler(Exception $e){
        error_log("[".date('Y-m-d H:i:s')."] Error text: {$e->getMessage()} | file: {$e->getFile()} | Line: {$e->getLine()}\n=Next Error=\n", 3, __DIR__.'/errors.log');
        $this->displayError("Exception", $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }



    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500){
        http_response_code($response);
        if(DEBUG){
            require 'views/dev.php';
        }else{
            require 'views/prod';
        }
        die;
    }
}

new ErrorHandler();

//echo $test;
//test();
//throw new Exception("exception", 404);