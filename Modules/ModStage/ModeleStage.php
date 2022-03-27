<?php
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
include_once 'Connexion.php';
class ModeleStage extends Connexion
{

    public function afficheListeStage() {
        $req = self::$bdd->prepare("SELECT * FROM etudiant natural join etudiant_stage natural join stage natural join entreprise_stage join entreprise;");
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }

}