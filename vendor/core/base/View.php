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
        if($layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    /**
     * @param $vars
     * @throws \Exception
     */
    public function render($vars)
    {
        //debug($vars);
        if(is_array($vars)){
            extract($vars);
        }
        $file_view = APP."/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
        // output is stored in an internal buffer
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        }else{
            //echo "<p> The view {$file_view} doesn't found </p>";
            throw new \Exception("<p> The view {$file_view} doesn't found </p>",
                404);
        }

        //data from buffer now in $content variable to send in layout
        $content = ob_get_clean();
        //

        if(false !== $this->layout){
            $file_layout = APP."/views/layouts/{$this->layout}.php";
            if(is_file($file_layout)){
                require $file_layout;
            }else{
                //echo "<h2>{$file_layout}</h2>template doesn't found";
                throw new \Exception("<h2>{$file_layout}</h2>template doesn't found",
                    404);
            }
        }
    }
}