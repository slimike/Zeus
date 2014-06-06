<?php
class Application_Model_User
{
protected $_mail_user;
protected $_nom_user;
protected $_prenom_user;
protected $_password_user;
protected $_adresse_1_user;
protected $_adresse_2_user;
protected $_zip_user;
protected $_nb_max_emprunt_user;
protected $_delais_emprunt_user;
protected $_service_user;
protected $_date_inscription;
protected $_bureau_user;
protected $_parution_id_parution;
protected $_actif_user;
protected $_valid_mail_user;
protected $_activation_user;
protected $_id_user;

public function setIdUser($id_user) {
    $this->_id_user = $id_user;
    return $this;
} 

public function getIdUser() {
    return $this->_id_user;
}



    /**
     * @param mixed $actif_user
     */
    public function setActifUser($actif_user)
    {
        $this->_actif_user = $actif_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActifUser()
    {
        return $this->_actif_user;
    }

    /**
     * @param mixed $activation_user
     */
    public function setActivationUser($activation_user)
    {
        $this->_activation_user = $activation_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivationUser()
    {
        return $this->_activation_user;
    }

    /**
     * @param mixed $adresse_1_user
     */
    public function setAdresse1User($adresse_1_user)
    {
        $this->_adresse_1_user = $adresse_1_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse1User()
    {
        return $this->_adresse_1_user;
    }

    /**
     * @param mixed $adresse_2_user
     */
    public function setAdresse2User($adresse_2_user)
    {
        $this->_adresse_2_user = $adresse_2_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse2User()
    {
        return $this->_adresse_2_user;
    }

    /**
     * @param mixed $bureau_user
     */
    public function setBureauUser($bureau_user)
    {
        $this->_bureau_user = $bureau_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBureauUser()
    {
        return $this->_bureau_user;
    }

    /**
     * @param mixed $date_inscription
     */
    public function setDateInscription($date_inscription)
    {
        $this->_date_inscription = $date_inscription;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->_date_inscription;
    }

    /**
     * @param mixed $delais_emprunt_user
     */
    public function setDelaisEmpruntUser($delais_emprunt_user)
    {
        $this->_delais_emprunt_user = $delais_emprunt_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDelaisEmpruntUser()
    {
        return $this->_delais_emprunt_user;
    }

    /**
     * @param mixed $mail_user
     */
    public function setEmailUser($mail_user)
    {
        $this->_mail_user = $mail_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailUser()
    {
        return $this->_mail_user;
    }

    /**
     * @param mixed $nb_max_emprunt_user
     */
    public function setNbMaxEmpruntUser($nb_max_emprunt_user)
    {
        $this->_nb_max_emprunt_user = $nb_max_emprunt_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNbMaxEmpruntUser()
    {
        return $this->_nb_max_emprunt_user;
    }

    /**
     * @param mixed $nom_user
     */
    public function setNomUser($nom_user)
    {
        $this->_nom_user = $nom_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomUser()
    {
        return $this->_nom_user;
    }

    /**
     * @param mixed $parution_id_parution
     */
    public function setParutionIdParution($parution_id_parution)
    {
        $this->_parution_id_parution = $parution_id_parution;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParutionIdParution()
    {
        return $this->_parution_id_parution;
    }

    /**
     * @param mixed $password_user
     */
    public function setPasswordUser($password_user)
    {
        $this->_password_user = $password_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPasswordUser()
    {
        return $this->_password_user;
    }

    /**
     * @param mixed $prenom_user
     */
    public function setPrenomUser($prenom_user)
    {
        $this->_prenom_user = $prenom_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenomUser()
    {
        return $this->_prenom_user;
    }

    /**
     * @param mixed $service_user
     */
    public function setServiceUser($service_user)
    {
        $this->_service_user = $service_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServiceUser()
    {
        return $this->_service_user;
    }

    /**
     * @param mixed $valid_mail_user
     */
    public function setValidMailUser($valid_mail_user)
    {
        $this->_valid_mail_user = $valid_mail_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValidMailUser()
    {
        return $this->_valid_mail_user;
    }

    /**
     * @param mixed $zip_user
     */
    public function setZipUser($zip_user)
    {
        $this->_zip_user = $zip_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZipUser()
    {
        return $this->_zip_user;
    }

}
