<?php

namespace MyApp\Model;

use MyApp\Model\BaseModel;

class Girokonten extends BaseModel
{
    public $id, $account_nr, $balance;
    
    public function getSource()
    {
        return "girokonten";
    }
}

?>