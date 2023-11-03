<?php

namespace MyApp\Controller;
use MyApp\Library\View;

class TestController
{
    protected $view;
    
    public function setView(View $view)
    {   
        $this->view = $view;
        
    }
    public function indexAction()
    {
        echo "Hi there, dass ist TestMessage aus dem TestController.php! - zugriff auf indexAction() -> index/Test!";
    }

    public function createAction()
    {
        echo "This Message is from TestController.php! - zugriff auf createAction() -> create/Test!";
    }
}
?>