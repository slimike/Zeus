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
            $data = $this->getRequest()->getPost();

            $user = new Application_Model_User();

            $user->setId('1'/*$data['id_user']*/)
                ->setEmail_user('billy@orange.fr'/*$data['mail_user']*/)
                ->setNom_user('wallace'/*$data['nom_user']*/)
                ->setPrenom_user('grommit'/*$data['prenom_user']*/)
                ->setAdresse_1_user('1 rue Albert'/*$data['adresse_1_user']*/)
                ->setAdresse_2_user(''/*$data['adresse_2_user']*/)
                ->setZip_user('69380'/*$data['zip_user']*/)
                ->setPassword_user('0000'/*$data['password_user']*/)
                ->setNb_max_emprunt_user('3'/*$data['nb_max_emprunt_user']*/)
                ->setDelais_emprunt_user('24'/*$data['delais_max_emprunt_user']*/)
                ->setService_user(''/*$data['service_user']*/)
                ->setDate_inscription('27/01/2014'/*$data['date_inscription']*/)
                ->setBureau_user(''/*$data['bureau_user']*/)
                ->setParution_id_parution(''/*$data['parution_id_user']*/)
                ->setActif_user(''/*$data['actif_user']*/)
                ->setValid_mail_user(''/*$data['valid_mail_user']*/)
                ->setActivation_user(''/*$data['activation_user']*/);

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
    public function fetchAllAction()
    {
       
        //Instance du Mapper
        $userMapper = new Application_Model_UserMapper();
        //Find
        $user = $userMapper->find($this->getRequest()->getParam('id'));
        //Envoie des données à la vue
        $this->view->user = $user;
    }

}