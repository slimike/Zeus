<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 15/05/14
 * Time: 09:35
 */
class UserController extends Zend_Controller_Action
{
    public function indexAction()
    {
        //Instance du Mapper
        $userMapper = new Application_Model_UserMapper();
        //FetchAll
        $user = $userMapper->fetchAll();
        //Envoie des données à la vue
        $this->view->user = $user;
    }
    /*
	 * Création d'un formulaire
	 */
    public function createAction()
    {
        //if($this->getRequest()->isPost()){
            //Récupération des données        

            $user = new Application_Model_User();
            $user -> setIdUser('1'/*$data['id_user']*/)
                ->setEmailUser('billy@orange.fr'/*$data['mailUser']*/)
                ->setNomUser('wallace'/*$data['nomUser']*/)
                ->setPrenomUser('grommit'/*$data['prenomUser']*/)
                ->setAdresse1User('1 rue Albert'/*$data['adresse_1User']*/)
                ->setAdresse2User(''/*$data['adresse_2User']*/)
                ->setZipUser('69380'/*$data['zipUser']*/)
                ->setPasswordUser('0000'/*$data['passwordUser']*/)
                ->setNbMaxEmpruntUser('3'/*$data['nb_max_empruntUser']*/)
                ->setDelaisEmpruntUser('24'/*$data['delais_max_empruntUser']*/)
                ->setServiceUser(''/*$data['serviceUser']*/)
                ->setDateInscription('27/01/2014'/*$data['date_inscription']*/)
                ->setBureauUser(''/*$data['bureauUser']*/)
                ->setParutionIdParution(''/*$data['parution_idUser']*/)
                ->setActifUser(''/*$data['actifUser']*/)
                ->setValidMailUser(''/*$data['valid_mailUser']*/)
                ->setActivationUser(''/*$data['activation_user']*/);

            //Instance du Mapper
            $userMapper = new Application_Model_UserMapper();
            //Save des données
            $userMapper->save($user);

            //Réponse à la vue
            $this->view->success = 'Enregistrement effectué';

        //}

    }

    /*
	 * Lecture d'un user
	 */
    public function readAction()
    {
       
        //Instance du Mapper
        $userMapper = new Application_Model_UserMapper();
        //Find
        $user = $userMapper->find($this->getRequest()->getParam('id'));
        //Envoie des données à la vue
        $this->view->user = $user;
    }
    public function fetchallAction()
    {
       
        //Instance du Mapper
        $userMapper = new Application_Model_UserMapper();
        //Find
        $user = $userMapper->fetchAll();
        //Envoie des données à la vue
        $this->view->user = $user;
    }

}