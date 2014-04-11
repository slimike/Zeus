<?php

class User{
    
    private $name;
    private $mail;
    private $mdp;
    private $avatar;
    private $fonction;
    //...
    
   
    
    public function getName() {
        return $this->name;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getFonction() {
        return $this->fonction;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function setFonction($fonction) {
        $this->fonction = $fonction;
    }

    //Creation ou modification de l'utilisateur
    public function createUpdateUser()
    {
        
    }
    
    public function deleteUser()
    {
        
    }
}
