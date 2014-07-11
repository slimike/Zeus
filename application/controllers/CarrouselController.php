<?php

class CarrouselController extends Zend_Controller_Action
{
	public function indexAction()
	{
		ini_set('display_errors', '1');
		/*$carouselMapper = new Application_Model_CarouselMapper();
		$carousel = $carouselMapper->fetchAll();

		$this->view->assign('carrousel', $carousel);*/
	}

	public function readAction()
	{
		$params = $this->getRequest()->getParams();

		$carouselMapper = new Application_Model_CarouselMapper();
		$carousel = $carouselMapper->find($params['id']);

		$this->view->assign("carrousel", $carousel);
	}	
}