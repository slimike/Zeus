<?php

require_once 'sql_const_conf.php';

class frame_sql {

    /**
     * 
     * @param string $ip
     * @param string $port
     * @param string $bdd
     * @param string $user
     * @param string $mdp
     * 
     */
    private function connect_bdd_and_recup($requete, $ip = NULL, $port = NULL, $bdd = NULL, $user = NULL, $mdp = NULL) {
        try {
            $dbh = new PDO('mysql:host=' . ADRESSE_IP . ';dbname=' . BDD, USER, MDP);

            if (strstr($requete, 'INSERT INTO')) {
                $result = $dbh->exec($requete);
            } else {
                $query = $dbh->query($requete);
                return $query->fetchAll(PDO::FETCH_ASSOC);
                $dbh->closeCursor();
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * Cette methode permet de faire un select en bdd.
     * @param string $champs champs1,champs2,....
     * @param string $table table1,table2,...
     * @param array $condition 'champs1 =' => 12,
     * @param array $trier champs => ASC
     * @param string $limit 0,1;
     */
    public function select($champs, $table, $condition = NULL, $trier = NULL, $limit = NULL) {
        //si un des champs obligatoire est vide

        if (($champs == NULL || $table == NULL) || (!isset($champs) && !isset($table))) {
            echo strtoupper('<br>ERREUR DANS L\'APPEL DE select. Il faut au minimum une table et un champs');

            exit(-1);
        } else {//dans le cas ou c'est pas vide'
            $requete = NULL;

            $requete = 'SELECT ';
            //ajout des champs
            $requete .= $champs;
            $requete .= ' FROM ';
            //ajout de tables
            $requete .= $table;
            //ajout des condition s'il y en a une
            $requete .=' WHERE ';
            if ($condition != NULL) {
                if (count($condition) > 1) { // s'il y a plus d'une condition
                    foreach ($condition as $key => $cond) {
                        trim($key);
                        trim($cond);
                        $requete .= $key . '"' . $cond . '"' . ' AND ';
                    }
                    $requete = substr($requete, 0, -5); //suppresion de la dernière virgule
                } else {
                    foreach ($condition as $key => $cond) {
                        trim($key);
                        trim($cond);
                        $requete .= $key . '"' . $cond . '"';
                        break;
                    }
                }
            }
            //verifier qu'il faut faire un tri'
            if ($trier != NULL) {

                if (count($trier) == 1) {
                    $requete .= ' ORDER BY ';
                    foreach ($trier as $key => $tri) {
                        $requete.=$key . ' ' . $tri;
                        break;
                    }
                }
            }
            //si il y a une limite
            if ($limit != NULL) {
                $requete .=' LIMIT ' . $limit;
            }
            $requete .= ';';
        }

        $result_request = $this->connect_bdd_and_recup($requete);
        $resultat = array();

        return $result_request;
    }

    /**
     * Faire un insert dans la base
     * @param array $value clef = champs,  valeur = value
     * @param type $table
     */
    public function insert($values, $table) {
        if (($value != NULL || $value != '' || !isset($value)) && ($table != NULL || $table != '' || !isset($table))) { //verifiaction que les variable sont bien rempli
            foreach ($values as $key => $value) {//recuparation des champs et des valeur attribuer dans des tableaux
                if ($key != '' || $key != NULL) {
                    $champs[] = $key;
                } else {
                    print 'ERREUR INSERT : La colonne n\'est pas définit';
                    exit();
                }
                $valeur[] = $value;
            }
            $champ = implode(',', $champs); //conversion des champs et des valeur en string séparer par des virgule
            $value = implode(',', $valeur);
            $requete = 'INSERT INTO ' . $table . ' (' . $champ . ') VALUES ("' . $value . '")'; //construction de la requête
            $requete .= ';';
            $this->connect_bdd_and_recup($requete); //execution de la requête
        } else {
            print 'ERREUR AU INSERT';
        }
    }

    /**
     * Faire un delete dans la base
     * @param array $row tableau associatif des conditions de suppression
     * @param string $table table où la ligne doit être supprimer
     * @param boolean $multidelete permet la suppression de plusieur ligne. si faux et plusieur ligne détécter renvoie une erreur
     */
    public function delete($row, $table, $multidelete) {
        if (($row != NULL || $row != '' || !isset($row)) && ($table != NULL || $table != '' || !isset($table))) { //verification des variable
            $result = $this->select('id', $table, $row); //recherche des colonnes

            if (count($result) && $multidelete) {
                foreach ($result as $rows) {//pour chaque resultat du select
                    foreach ($rows as $key => $line) {//supprsion de la ligne
                        $requete = 'DELETE FROM ' . $table . ' WHERE ' . $key . ' = ' . $line;
                        $this->connect_bdd_and_recup($requete); //execution de la requête
                    }
                }
            } else {
                print 'ERREUR AU DELETE CONDITION POUR LA SUPRRESSION PAS ASSEZ PRECIS, PLUSIEUR RESULTAT TROUVE';
                exit();
            }
        } else {
            print 'ERREUR AU DELETE';
        }
    }

    public function update() {
        
    }

}
