<?php

namespace MyApp\Library;

class View
{
    protected $path, $controllerName, $action;

    public function __construct($path, $controller, $action)
    {
        $this->path = $path;
        $this->controllerName = $controller;
        $this->action = $action;
    }

    public function render()
    {
        $filename = $this->path.DIRECTORY_SEPARATOR.$this->controllerName.DIRECTORY_SEPARATOR.$this->action.DIRECTORY_SEPARATOR.$this->action.".xyz";

        include $filename; //index.phtml
    }
    
}

?>