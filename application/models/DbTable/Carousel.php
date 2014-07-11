<?php

class Application_Model_DbTable_Carousel extends Zend_Db_Table_Abstract
{
	protected $_name = 'carousel';
	protected $_primary = 'carousel_id';
	protected $_dependentTables = array(
		'Core_Model_DbTable_Parution'
	);
	
}