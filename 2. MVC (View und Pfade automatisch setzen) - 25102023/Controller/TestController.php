<?php

namespace MyApp\Controller;

class TestController
{
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