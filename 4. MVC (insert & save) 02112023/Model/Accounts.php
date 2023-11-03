<?php

namespace MyApp\Model;

use MyApp\Model\BaseModel;

class Accounts extends BaseModel
{
    public $id, $firstname, $surename, $email, $girokonto_id, $sparbuch_id;

    public function getSource()
    {
        return "accounts";
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of surename
     */ 
    public function getSurename()
    {
        return $this->surename;
    }

    /**
     * Set the value of surename
     *
     * @return  self
     */ 
    public function setSurename($surename)
    {
        $this->surename = $surename;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of girokonto_id
     */ 
    public function getGirokonto_id()
    {
        return $this->girokonto_id;
    }

    /**
     * Set the value of girokonto_id
     *
     * @return  self
     */ 
    public function setGirokonto_id($girokonto_id)
    {
        $this->girokonto_id = $girokonto_id;

        return $this;
    }

    /**
     * Get the value of sparbuch_id
     */ 
    public function getSparbuch_id()
    {
        return $this->sparbuch_id;
    }

    /**
     * Set the value of sparbuch_id
     *
     * @return  self
     */ 
    public function setSparbuch_id($sparbuch_id)
    {
        $this->sparbuch_id = $sparbuch_id;

        return $this;
    }
}

?>