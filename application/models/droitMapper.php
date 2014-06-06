<?php

class Application_Model_DroitMapper {

    protected $_dbTable;

    public function setDbTable($dbTable) {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception("Invalide table data");
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable() {
        if (null === $this->_dbTable) {
            $this->setDbTable('application_models_DbTable_Droit');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Droit $droit) {
        $data = array(
            'id_droit' => $user->getIdDroit(),
            'all_droit' => $user->getAllDroit(),
            'ajout_user_droit' => $user->getAjoutUserDroit(),
            'sup_user_droit' => $user->getSupUserDroit(),
            'ajout_paru_droit' => $user->getAjoutParuDroit(),
            'modif_paru_droit' => $user->getModifParuDroit(),
            'sup_paru_droit' => $user->getSupParuDroit(),
            'ajout_emprunt_droit' => $user->getAjoutEmpruntDroit(),
            'modifier_emprunt_droit' => $user->getModifierEmpruntDroit(),
            'sup_emprunt_droit' => $user->getSupEmpruntDroit(),
            'user_id_user' => $user->getUserIdUser(),
            'created' => date('Y-m-d H:i:s')
        );

        $this->getDbTable()->insert($data);
    }

    public function find($id) {
        $result = $this->getDbTable()->find($id);
        if (0 === count($result)) {
            return;
        }

        $row = $result->current();
        $droit = $this->toModel($row);

        return $droit;
    }

    public function fetchAll() {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();

        foreach ($resultSet as $row) {
            $entries[] = $this->toModel($row);
        }
        return $entries;
    }

    public function toModel($row) {
        $droit = new Application_Model_Droit();
        $droit->setId($row->id_droit)
                ->setDateDroit($row->all_droit)
                ->setDateRetour($row->ajout_user_droit)
                ->setUserIdUser($row->modif_user_droit)
                ->setParutionIdParution($row->sup_user_droit)
                ->setParutionIdParution($row->ajout_paru_droit)
                ->setParutionIdParution($row->modif_paru_droit)
                ->setParutionIdParution($row->sup_paru_droit)
                ->setParutionIdParution($row->ajout_emprunt_droit)
                ->setParutionIdParution($row->modifier_emprunt_droit)
                ->setParutionIdParution($row->sup_emprunt_droit)
                ->setParutionIdParution($row->sup_user_id_user)
                ->setCreated($row->created);

        return $droit;
    }

}
