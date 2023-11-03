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

        while ($row = $result->fetch_object())
        {
            $collection = $row;
        }

        return $collection;
        //return $result->fetch_object();

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
                $ops.=$key. '='. $value .' AND ';
            }

            $ops = substr($ops,0,-4);
        
            $ops = 'WHERE'.$ops;
        }

        $result = $conn->query("SELECT * FROM ".$table." ". $ops);
        
        //echo "SELECT * FROM ".$table." ". $ops;
        while ($row = $result->fetch_object())
        {
            $collection[] = $row;
        }

        return $collection;
    }

    /**
     * 
     * speichern aller Daten
     * 
     */

    public function save()
    {
        $conn = $this->getConnection();

        $table = $this->getSource();

        $thisData = array();

        //kopieren der Daten aus $this -> $thisdata
        foreach ($this as $key => $value)
        {
            $thisData[$key] = $value;
        }

        if (isset($thisData["id"]))
        {
            //update
            //$values = firstname='$firstname', surename='$surename', email='$email';
            $values = "";
            
            foreach ($thisData as $key => $value)
            {
                if(($key !="id") && ($key != "conn"))
                {
                    $values .= $key."='". $value . "', ";

                }
                
            }

            $values = substr($values,0,-2);

            //$conn->query("UPDATE accounts SET firstname='$firstname', surename='$surename', email='$email' WHERE id='$id'");
            $conn->query("UPDATE ".$table." SET ".$values." WHERE id=".$thisData['id']);
            
        }
        else
        {
            //insert
            //$columns = "firstname, surename, email, girokonto_id, sparbuch_id";
            $columns = "";
            //$values = "'".$_POST['firstname']."', '".$_POST['surename']."', '".$_POST['email']."', NULL, NULL";
            $values = "";

            foreach ($thisData as $key => $value)
            {
                if(($key !="id") && ($key != "conn"))
                {
                    $columns .=$key." , ";
                    
                    $values .= "'".$value."', ";
                }
            }

            $columns = substr($columns,0,-2);
            $values = substr($values,0,-2);

            $conn->query("INSERT INTO ".$table." (".$columns.") VALUES (".$values.")");
        }
    }

    abstract public function getSource();
    
}

?>