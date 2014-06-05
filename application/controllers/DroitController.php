<?php

class DroitController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$droitMapper = new Application_Model_DroitMapper();
		$droit = $droitMapper->fetchAll();

		$this->view->assign('droit', $droit);
	}

	public function readAction()
	{
		$params = $this->getRequest()->getParams();

		$droitMapper = new Application_Model_DroitMapper();
		$droit = $droitMapper->find($params['id']);

		$this->view->assign("droit", $droit);
	}
	public function createAction()
	{
		//Form
		$form = new Application_Form_Droit();
		$this->view->formDroit = $form;

		if($this->getRequest()->isPost()){
			//Récupération des données
			$data = $this->getRequest()->getPost();
			//Validation des données par le Form
			if($form->isValid($data)){
				//Transfert des données dans un objet droit
				$droit = new Application_Model_Droit();
				$droit->setAllDroit($data['all_droit'])
                                                ->setAjoutUserDroit($data['ajout_user_droit'])
                                                ->setModifUserDroit($data['modif_user_droit'])
                                                ->setSupUserDroit($data['sup_user_droit)'])
                                                ->setAjoutParuDroit($data['ajout_paru_droit'])
                                                ->setModifParuDroit($data['modif_paru_droit'])
                                                ->setSupParuDroit($data['sup_paru_droit'])
                                                ->setAjoutEmpruntDroit($data['ajout_emprunt_droit'])
                                                ->setModifierEmpruntDroit($data['modifier_emprunt_droit'])
                                                ->setSupEmpruntDroit($data['sup_emprunt_droit'])
                                                ->setUserIdUser($data['user_id_user']);
						
				//Instance du Mapper
				$droitMapper = new Application_Model_DroitMapper();
				//Save des données
				$droitMapper->save($droit);
				//Réponse à la vue
				$this->view->success = 'Enregistrement effectué';
			}
		}
	}
}