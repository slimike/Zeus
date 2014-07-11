<?php
class Application_Model_CarouselMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if(is_string($dbTable))
        {
            $dbTable = new $dbTable();
        }

        if (!$dbTable instanceof Zend_Db_Table_Abstract)
        {
            throw new Exeption ('Invalid table data');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if(null === $this->_dbTable)
        {
            $this->setDbTable('Application_Model_DbTable_Carousel');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Carousel $carousel)
    {
        $data = array (
            'carousel_img'=> $carousel->getCarousel_img(),
            'carousel_txt' =>$parution->getCarousel_txt()

        );
        $this->getDbTable()->insert($data);
    }

    public function find($id)
    {
        $result = $this->getDbTable()->find($id);
        if(0 === count($result))
        {
            return;
        }
        $row = $result -> current();
        $carousel = new Application_Model_Carousel();
        $carousel->setId($row->carousel_id)
            ->setCarousel_img($row->carousel_img)
            ->setCarousel_txt($row->carousel_txt);
        return $carousel;
    }

    public function fetchAll()
    {
        $resultSet=$this->getDbTable()->fetchAll();
        $entries = array();

        foreach ($resultSet as $row) {
            $entries[]=$this->toModel($row);
        }
        return $entries;
    }

    public function toModel($row)
    {
        $carousel = new Application_Model_Carousel();
        $carousel->setCarousel_id($row->carousel_id)
            ->setCarousel_img($row->carousel_img)
            ->setCarousel_txt($row->carousel_txt);
        return $carousel;
    }
}
