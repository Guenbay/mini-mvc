<?php

namespace MyApp\Controller;
use MyApp\Library\View;
use MyApp\Model\Accounts;
use MyApp\Model\Girokonten;


class AccountsController
{
    protected $view;
    
    public function setView(View $view)
    {   
        $this->view = $view;
    }

    public function indexAction()
    {
        $accounts = new Accounts();
        $collection = $accounts->find();
        //var_dump($collection);
        $this->view->setDataCollection($collection);
    }

    public function createAction()
    {
        echo "This Message is from TestController.php! - zugriff auf createAction() -> create/Test!";

        if ($_POST["submit"])
        {
            $data = $_POST;

            $account = new Accounts();
            $account->setID($data["id"]);
            $account->setFirstname($data["name"]);
            $account->setEmail($data["email"]);
            $account->save();

            $giro = new Girokonten();
            $giro->balance= 1000;
            $giro->account_nr=2;
            $giro->save();
            
        }
    }

    public function updateAction()
    {
        $account = new Accounts();

        if (isset($_GET['id']))
        {
            $id = $_GET['id'];

            $obj = $account->find(array("id"=>$id));

            $this->view->setDataCollection($obj);
        }

        if (isset($_POST["submit"]))
        {
            $data = $_POST;

            $account->setId($data["id"]);
            $account->setFirstname($data["name"]);
            $account->setEmail($data["email"]);
            $account->save();

            header("Location: index.php?controller=accounts&action=index");
        }
    }
}
?>