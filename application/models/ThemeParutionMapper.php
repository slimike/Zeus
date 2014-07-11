<?php

class Application_Model_ThemeParutionMapper {

    protected $_dbTable;

    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_ThemeParution;
    }

    public function save(Application_Model_ThemeParution $themeParution) {
        $data = array(
            'id_themeParution' => $themeParution->getId_themeParution(),
            'name_themeParution' => $themeParution->getName_themeParution(),
            'id_typeParution' => $themeParution->getId_typeParution()
        );

        if ($themeParution->getId_themeParution()) {

            unset($data['id_themeParution']);
            $this->_dbTable->insert($data);
        } else {
            $this->_dbTable->update($data, 'id_themeParution = ' . $themeParution->getId_themeParution());
        }
    }

    public function find($id) {
        $result = $this->_dbTable->find($id)->current();
       
        if (0 === count($result)) {
            return;
        }
        
        
        $parution = $this->toModel($result);
        return $parution;
    }

    public function fetchAll() {
        $resultSet = $this->_dbTable->fetchAll();
        $entries = array();

        foreach ($resultSet as $row) {
            $entries[] = $this->toModel($row);
        }
        return $entries;
    }

    public function toModel($row) {
        $parution = new Application_Model_ThemeParution();
        $parution->setId_themeParution($row->id_themeParution)
                ->setName_themeParution($row->name_themeParution);
        return $parution;
    }

}
