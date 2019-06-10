<?php


namespace app\controllers\admin;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use projectFiles\core\base\View;

class UserController extends AppController
{
    /**
     * @throws \Exception
     */
    public function indexAction(){
        
        // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(ROOT.'tmp/errors.log', Logger::WARNING));

        // add records to the log
        $log->warning('Foo');
        $log->error('Bar');

        $test = "test var 11";
        $this->set(
          ["test" => $test]
        );
    }

    public function testAction(){
    }
}
