<?php

namespace MyApp\Library;

class View
{
    protected $path, $controllerName, $action;

    public $data;

    public function __construct($path, $controller, $action)
    {
        $this->path = $path;
        $this->controllerName = $controller;
        $this->action = $action;
    }

    public function setData($data)
    {
            foreach( $data as $key => $value )
            {
               $this->data[$key] = $value;
            }
    }

    public function setDataCollection($data)
    {
        //$this->data = $data;

        for ($i = 0; $i < count($data); $i++)
        {
            foreach( $data[$i] as $key => $value )
            {
               $this->data[$key] = $value;
            }
        }
    }

    public function render()
    {
        $filename = $this->path.DIRECTORY_SEPARATOR.$this->controllerName.DIRECTORY_SEPARATOR.$this->action.DIRECTORY_SEPARATOR.$this->action.".xyz";
        
        $collection = array();
        
        if(isset($this->data))
        {
            foreach ( $this->data as $key => $value )
            {
                if(is_object($value))
                {
                    //$collection[$key] = $value->render();
                    $collection[] = $value;
                }
                $$key = $value;
            }
        }

        //foreach ( $this->data as $key => $value )
        //{
        //    //$filename .= $key."".$value."";
        //    $$key = $value;
        //}

        include $filename; //index.phtml
    }
    
}

?>