<?php

class Application_Model_Commentaire
{
	protected $_idcommentaire;
	protected $_note_commentaire;
	protected $_com_commentaire;
	protected $_created;

	public function setId($idcommentaire){
		$this->_idcommentaire = (int) $idcommentaire;
		return $this;
	}
	public function getId(){
		return $this->_idcommentaire;
	}
	public function setNoteCommentaire($note_commentaire){
		$this->_note_commentaire = $note_commentaire;
		return $this;
	}
	public function getNoteCommentaire(){
		return $this->_note_commentaire;
	}
	public function setComCommentaire($com_commentaire){
		$this->_com_commentaire = $com_commentaire;
		return $this;
	}
	public function getComCommentaire(){
		return $this->_com_commentaire;
	}	
	public function setCreated($created){
		$this->_created = $created;
		return $this;
	}
	public function getCreated(){
		return $this->_created;
	}
}