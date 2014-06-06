<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 15/05/14
 * Time: 09:35
 */
class ParutionController extends Zend_Controller_Action
{
    public function indexAction()
    {
        //Instance du Mapper
        $parutionMapper = new Application_Model_ParutionMapper();
        //FetchAll
        $parution = $parutionMapper->fetchAll();
        //Envoie des données à la vue
        $this->view->parution = $parution;
    }
    /*
	 * Création d'un formulaire
	 */
    public function createAction()
    {

        if($this->getRequest()->isPost()){
            //Récupération des données
            $data = $this->getRequest()->getPost();
                $parution = new Application_Model_Parution();

            $parution->setId(0)
                    ->setTitre_parution('cololasticot')
                    ->setAuteur_parution('cyrano')
                    ->setTheme_parution('siencF')
                    ->setDate_parution('20/10/2014')
                    ->setQte_dispo_parution(1)
                    ->setQte_total_parution(4)
                    ->setEditeur_parution('flamarion')
                    ->setCollection_parution('colection')
                    ->setDescription_parution('livre qui dechire wesh')
                    ->setPublier_parution('dispo')
                    ->setCommentaire_id_commentaire(1);

                //Instance du Mapper
                $parutionMapper = new Application_Model_ParutionMapper();
                //Save des données
                $parutionMapper->save($parution);
                var_dump($parution);

                //Réponse à la vue
                $this->view->success = 'Enregistrement effectué';

        }

    }

    /*
	 * Lecture d'un user
	 */
    public function readAction()
    {
        //Instance du Mapper
        $parutionMapper = new Application_Model_ParutionMapper();
        //Find
        $parution = $parutionMapper->find($this->getRequest()->getParam('id'));
        //Envoie des données à la vue
        $this->view->parution = $parution;
    }

    public function fetchallAction()
    {
        //Instance du Mapper
        $parutionMapper = new Application_Model_ParutionMapper();
        //Find
        $parution = $parutionMapper->fetchAll();
        //Envoie des données à la vue
        $this->view->parution = $parution;
    }
}