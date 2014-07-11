<?php

class Application_Model_TypeParutionMapper {

    protected $_dbTable;

    public function __construct() {
        $this->_dbTable = new Application_Model_DbTable_TypeParution;
    }

    public function save(Application_Model_TypeParution $typeParution, Application_Model_ThemeParution $themeParution) {
        $data = array(
            'id_typeParution' => $typeParution->getId_typeParution(),
            'name_typeParution' => $typeParution->getName_TyeParution(),
            'id_themeParution' => $themeParution->getId_themeParution()
        );

        if ($typeParution->getId_TypeParution()) {

            unset($data['id_typeParution']);
            $this->_dbTable->insert($data);
        } else {
            $this->_dbTable->update($data, 'id_typeParution = ' . $typeParution->getId_TypeParution());
        }
    }

    public function find($id) {
        $result = $this->_dbTable->find($id);
        if (0 === count($result)) {
            return;
        }
        $row = $result->current();
        $parution = $this->toModel($row);
        $theme = new Application_Model_ThemeParutionMapper();
        
        $parution->setObject_themeParution($theme->find($parution->getId_themeParution()));
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
        $parution = new Application_Model_TypeParution();
        $parution->setId_TypeParution($row->id_typeParution)
                ->setName_TypeParution($row->name_typeParution);
        
        $themeMapper = new Application_Model_ThemeParutionMapper();
        $theme = $themeMapper->find($row->id_themeParution);
        $parution->setObject_themeParution($theme);
       
        $parution->setId_themeParution($theme->getId_themeParution());
        return $parution;
    }

}
