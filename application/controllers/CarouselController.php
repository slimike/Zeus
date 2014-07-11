<?php

class CarouselController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$carouselMapper = new Application_Model_CarouselMapper();
		$carousel = $carouselMapper->fetchAll();

		$this->view->assign('carousel', $carousel);
	}

	public function readAction()
	{
		$params = $this->getRequest()->getParams();

		$carouselMapper = new Application_Model_CarouselMapper();
		$carousel = $carouselMapper->find($params['id']);

		$this->view->assign("carousel", $carousel);
	}	
}