<?php
class Application_Model_ParutionMapper
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
            $this->setDbTable('Application_Model_DbTable_Parution');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Parution $parution)
    {
        $data = array (
            'titre_parution'=> $parution->getTitreParution(),
            'auteur_parution' =>$parution->getAuteurParution(),
            'theme_parution' =>$parution->getThemeParution(),
            'date_parution'=>$parution->getDateParution(),
            'qte_dispo_partuion'=>$parution->getQteDispoParution(),
            'qte_total_partuion'=>$parution->getQteTotalParution(),
            'editeur_parution'=>$parution->getEditeurParution(),
            'collection_parution'=>$parution->getCollectionParution(),
            'description_parution'=>$parution->getDescriptionParution(),
            'publier_parution'=>$parution->getPublierParution(),
            'commentaire_id_commentaire'=>$parution->getCommentaireIdCommentaire()

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
        $parution = new Application_Model_Parution();
        $parution->setId($row->id_parution)
            ->setTitre_parution($row->Titre_parution)
            ->setAuteur_parution($row->auteur_parution)
            ->setTheme_parution($row->prenom_user)
            ->setDate_parution($row->adresse_1_user)
            ->setQte_dispo_parution($row->qte_dispo_parution)
            ->setQte_total_parution($row->qte_total_parution)
            ->setEditeur_parution($row->editeur_parution)
            ->setCollection_parution($row->collection_parution)
            ->setDescription_parution($row->description_parution)
            ->setPublier_parution($row->publier_parution)
            ->setCommentaire_id_commentaire($row->Commentaire_id_commentaire);
        return $parution;
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
        $parution = new Application_Model_Parution();
        $parution->setId($row->id_parution)
            ->setTitre_parution($row->Titre_parution)
            ->setAuteur_parution($row->auteur_parution)
            ->setTheme_parution($row->prenom_user)
            ->setDate_parution($row->adresse_1_user)
            ->setQte_dispo_parution($row->qte_dispo_parution)
            ->setQte_total_parution($row->qte_total_parution)
            ->setEditeur_parution($row->editeur_parution)
            ->setCollection_parution($row->collection_parution)
            ->setDescription_parution($row->description_parution)
            ->setPublier_parution($row->publier_parution)
            ->setCommentaire_id_commentaire($row->Commentaire_id_commentaire);
        return $parution;
    }
}
