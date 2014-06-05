<?php
class Application_Model_CommentaireMapper
{
	protected $_dbTable;

	public function setDbTable($dbTable)
	{
		if(is_string($dbTable)){
					$dbTable = new $dbTable();
				}
		if (!$dbTable instanceof Zend_Db_Table_Abstract){
			throw new Exception("Invalide table data");
		}
		$this->_dbTable = $dbTable;
		return $this;
	}

	public function getDbTable()
	{
		if (null === $this->_dbTable){
			$this->setDbTable('Application_Model_DbTable_Commentaire');
		}
		return $this->_dbTable;
	}

	public function save(Application_Model_Commentaire $commentaire)
	{
		$data = array(
			'idcommentaire'      => $user->getIdCommentaire(),
			'note_commentaire'      => $user->getNoteCommentaire(),
			'com_commentaire'    => $user->getComCommentaire(),
			'created'   => date('Y-m-d H:i:s')
			);
              
		$this->getDbTable()->insert($data);
	}

	public function find($id)
	{
		$result = $this->getDbTable()->find($id);
		if(0 === count($result)){
			return;
		}

		$row = $result->current();
		$commentaire = $this->toModel($row);
		
		return $commentaire;
	}

	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries = array();

		foreach($resultSet as $row){
			$entries[] = $this->toModel($row);
		}
		return $entries;
	}

	public function toModel($row){
		$commentaire = new Application_Model_Commentaire();
		$commentaire->setId($row->idcommentaire)
				  ->setNoteCommentaire($row->note_commentaire)
				  ->setComCommentaire($row->com_commentaire)
				  ->setCreated($row->created);

		return $commentaire;
	}
}