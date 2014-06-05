<?php

class EmpruntController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$empruntMapper = new Application_Model_EmpruntMapper();
		$emprunt = $empruntMapper->fetchAll();

		$this->view->assign('emprunt', $emprunt);
	}

	public function readAction()
	{
            
           
		$params = $this->getRequest()->getParams();

		$empruntMapper = new Application_Model_EmpruntMapper();
		$emprunt = $empruntMapper->find($params['id']);

		$this->view->assign("emprunt", $emprunt);
	}
	public function createAction()
	{
		//Form
		$form = new Application_Form_Emprunt();
		$this->view->formEmprunt = $form;

		if($this->getRequest()->isPost()){
			//Récupération des données
			$data = $this->getRequest()->getPost();
			//Validation des données par le Form
			if($form->isValid($data)){
				//Transfert des données dans un objet emprunt
				$emprunt = new Application_Model_Emprunt();
				$emprunt->setDateEmprunt($data['date_emprunt'])
                                                ->setDateRetour($data['date_retour'])
                                                ->setUserIdUser($data['user_id_user'])
                                                ->setParutionIdParution($data['parution_id_parution)']);
						
				//Instance du Mapper
				$empruntMapper = new Application_Model_EmpruntMapper();
				//Save des données
				$empruntMapper->save($emprunt);
				//Réponse à la vue
				$this->view->success = 'Enregistrement effectué';
			}
		}
	}
}