<?php

namespace app\controllers;

use vendor\core\base\Controller;

class Page extends Controller
{
    public function viewAction()
    {
        debug($this->route);
        debug($_GET);
        echo "</br>Page view method <h3>Works</h3></br>";
    }
}