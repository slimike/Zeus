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

            $query = $dbh->query($requete);
            return $query->fetchAll(PDO::FETCH_ASSOC);
            $dbh->closeCursor();
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
        if ($value != NULL || $value != '' || !isset($value)) {
            foreach ($values as $key => $value) {
                $champs[] = $key;
                $valeur[] = $value;
            }
            $champ = implode(',', $champs);
            $value = implode(',', $valeur);
            $requete = 'INSERT INTO ' . $table . ' SET ' . $champ . ' VALUE ' . $value;
            $requete .= ';';
            $result_request = $this->connect_bdd_and_recup($requete);
            $resultat = array();

            return $result_request;
        } else {
            print 'ERREUR AU INSERT';
        }
    }

}
