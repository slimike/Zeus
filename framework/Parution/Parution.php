<?php

class Parution
{
    private $name;
    private $autor;//objet auteur
    private $theme;
    private $id;
    private $quantite;
    //...
    
    /**
     * 
     * @param string $name Item de recherche de la parution
     */
    public function __construct($name) {
        
    }
 /**
  * Retourne toutes les infos de la parution sous forme de talbeau
  */
    public function getInfo()
    {
        
    }
    public function getName() {
        return $this->name;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getTheme() {
        return $this->theme;
    }

    public function getId() {
        return $this->id;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setTheme($theme) {
        $this->theme = $theme;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function setCouverture($pathFile)
    {
        
    }
    /*
     * creation ou modification d'une parution
     */
    public function createUpdateParution()
    {
        
    }
    
    public function delete()
    {
        
    }

}

