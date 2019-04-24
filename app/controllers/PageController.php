<?php

namespace app\controllers;

class PageController extends AppController
{
    public function viewAction()
    {
        debug($this->route);
        debug($_GET);
        echo "</br>Page view method <h3>Works</h3></br>";
    }
}