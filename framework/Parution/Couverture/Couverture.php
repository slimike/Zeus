<?php

class Couverture extends Parution
{
     //recuperation du fichier image
    public function recupAvatar()
    {
        
    }
    public function userAvatar($pathFile)
    {
        parent->setCouverture($pathFile);
    }
}

}

