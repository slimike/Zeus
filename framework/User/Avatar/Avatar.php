<?php

class Avatar extends User
{
    //recuperation du fichier image
    public function recupAvatar()
    {
        
    }
    public function userAvatar($pathFile)
    {
        parent->setAvatar($pathFile);
    }
}
