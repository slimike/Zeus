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
        
            //Récupération des données
            $parution = new Application_Model_Parution();

            $parution->setIdParution(0)
                    ->setTitreParution('cololasticot')
                    ->setAuteurParution('cyrano')
                    ->setThemeParution('siencF')
                    ->setDateParution('20/10/2014')
                    ->setQteDispoParution(1)
                    ->setQteTotalParution(4)
                    ->setEditeurParution('flamarion')
                    ->setCollectionParution('colection')
                    ->setDescriptionParution('livre qui dechire wesh')
                    ->setPublierParution('dispo')
                    ->setCommentaireIdCommentaire(1);

                //Instance du Mapper
                $parutionMapper = new Application_Model_ParutionMapper();
                //Save des données                
                $parutionMapper->savedd($parution); 
                

                //Réponse à la vue
                $this->view->success = 'Enregistrement effectué';

        

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
