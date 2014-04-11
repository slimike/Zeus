<?php

class Auteur{
    private $name;
    private $id;
    
    public function __construct($s_auteur) {
        ;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setId($id) {
        $this->id = $id;
    }


}