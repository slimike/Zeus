<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menuParution
 *
 * @author Administrateur
 */
class Application_Plugin_menuParution {

    public function __construct() {
        
    }

    public function getTypeParution() {
        $type = new Application_Model_TypeParutionMapper();
        return $type->fetchAll();
    }

}
