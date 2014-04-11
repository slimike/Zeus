<?php

class Couverture extends Parution
{
     //recuperation du fichier image
    public function recupCouverture()
    {
        
    }
    public function parutionCouverture($pathFile)
    {
        parent->setCouverture($pathFile);
    }
}

}

