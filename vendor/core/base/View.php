<?php

namespace vendor\core\base;

class View {

    /**
     * current path
     *
     * @var array
     */
    public $route = [];

    /**
     * current view
     *
     * @var string
     */
    public $view;

    /**
     * current template
     *
     * @var string
     */
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }

    public function render()
    {
        $file_view = APP."/views/{$this->route['controller']}/{$this->view}.php";
        // output is stored in an internal buffer
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        }else{
            echo "<p> The view {$file_view} doesn't found </p>";
        }
        //data from buffer now in $content variable
        $content = ob_get_clean();
        $file_layout = APP."/views/layouts/{$this->layout}.php";
        if(is_file($file_layout)){
            require $file_layout;
        }else{
            echo "<h2>{$file_layout}</h2>template doesn't found";
        }
    }
}