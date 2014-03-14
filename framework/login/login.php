<?php

require_once FRAME_SQL;

class login {

    /**
     * 
     * @param string $table chaine de caractere des tables a inclure ex. table1,table2
     * @param type $champs chaine de caractere des champs a inclure ex. array(champs1 => contenue, champs2 => autre contenue)
     */
    public function login_site($s_table, $a_champs) {
        $listeChamps = NULL;
        foreach ($a_champs as $champs => $contenue) {
            $condition[$champs . '='] = $contenue;
            $listeChamps .=$champs.',';
        }
        
        $listeChamps = substr($listeChamps, 0,-1);
        
        
        $frame_sql = new frame_sql();
        
       
    }

}
