<?php

class CommentaireController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$commentaireMapper = new Application_Model_CommentaireMapper();
		$commentaire = $commentaireMapper->fetchAll();

		$this->view->assign('commentaire', $commentaire);
	}

	public function readAction()
	{
		$params = $this->getRequest()->getParams();

		$commentaireMapper = new Application_Model_CommentaireMapper();
		$commentaire = $commentaireMapper->find($params['id']);

		$this->view->assign("commentaire", $commentaire);
	}
	public function createAction()
	{
		//Form
		$form = new Application_Form_Commentaire();
		$this->view->formCommentaire = $form;

		if($this->getRequest()->isPost()){
			//Récupération des données
			$data = $this->getRequest()->getPost();
			//Validation des données par le Form
			if($form->isValid($data)){
				//Transfert des données dans un objet commentaire
				$commentaire = new Application_Model_Commentaire();
				$commentaire->setNoteCommentaire($data['note_commentaire'])
                                                ->setComCommentaire($data['com_commentaire']);
                                
				//Instance du Mapper
				$commentaireMapper = new Application_Model_CommentaireMapper();
				//Save des données
				$commentaireMapper->save($commentaire);
				//Réponse à la vue
				$this->view->success = 'Enregistrement effectué';
			}
		}
	}
}