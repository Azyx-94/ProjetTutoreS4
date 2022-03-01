<?php
require_once "./Modules/ModAccueil/ModeleAccueil.php";
require_once "./Modules/ModAccueil/VueAccueil.php";
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
class ContAccueil
{

    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleAccueil();
        $this->vue = new VueAccueil();
    }

    public function afficheAccueil() {
        $this->vue->afficheAccueil();
    }

}