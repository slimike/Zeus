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

            $parution->setId($data['id_parution'])
                    ->setTitre_parution($data['titre_parution'])
                    ->setAuteur_parution($data['auteur_parution'])
                    ->setTheme_parution($data['theme_parution'])
                    ->setDate_parution($data['date_parution'])
                    ->setQte_dispo_parution($data['qte_dispo_parution'])
                    ->setQte_total_parution($data['qte_total_parution'])
                    ->setEditeur_parution($data['editeur_parution'])
                    ->setCollection_parution($data['collection_parution'])
                    ->setDescription_parution($data['description_parution'])
                    ->setPublier_parution($data['publier_parution'])
                    ->setCommentaire_id_commentaire($data['commentaire_id_commentaire']);

                //Instance du Mapper
                $parutionMapper = new Application_Model_ParutionMapper();
                //Save des données
                $parutionMapper->save($parution);

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
        $parutionMapper = new Application_Model_UserMapper();
        //Find
        $parution = $parutionMapper->find($this->getRequest()->getParam('id'));
        //Envoie des données à la vue
        $this->view->parution = $parution;
    }

}