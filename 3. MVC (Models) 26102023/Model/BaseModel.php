<?php

namespace MyApp\Model;

use mysqli;
use MyApp\Controller;

abstract class BaseModel
{
    private $conn; //das ist wie eine $pdo

    public function getConnection()
    {
        $this->conn = new mysqli("localhost","root","", "");
        $this->conn->select_db("bankomat");
        return $this->conn;
    }

    //SELECT * FROM table WHERE id = 1
    public function findFirst($options)
    {
        $model = new static();

        $table = $model->getSource();

        $conn = $this->getConnection();

        //name=>"name", email=>"mail@provider.de"  ---> name = 'name' AND email = 'mail@provider.de'

        $ops= '';

        foreach ($options as $key => $value)
        {
            //$ops.=$key.'='.$value.'';
            $ops.=$key.'='.$value.' AND ';
        }
        $ops = substr($ops,0,-4);
        
        $result = $conn->query("SELECT * FROM ". $table." WHERE ". $ops);
        echo "SELECT * FROM ". $table." WHERE ". $ops;
        return $result->fetch_object();

    }

    public function find($options = "")
    {
        //$collection = new static();
        $collection = array();

        $model = new static();

        $table = $model->getSource();

        $conn = $this->getConnection();

        $ops = '';

        if(is_array($options))
        {
            foreach ($options as $key => $value)
            {
                //$ops.=$key.'='.$value.'';
                $ops.=$key.'='.$value.'AND';
            }
            $ops = substr($ops,0,-4);
        
            $ops = 'WHERE'.$ops;
        }

        $result = $conn->query("SELECT * FROM ".$table." ". $ops);
        echo "SELECT * FROM ".$table." ". $ops;
        while ($row = $result->fetch_object())
        {
            $collection[] = $row;
        }

        return $collection;
    }

    abstract public function getSource();
    
}

?>