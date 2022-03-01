<?php
require_once "./Modules/ModConventionStage/ModeleConventionStage.php";
require_once "./Modules/ModConventionStage/VueConventionStage.php";
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
class ContConventionStage
{

    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleConventionStage();
        $this->vue = new VueConventionStage();
    }

    public function afficheAccueilConventionStage() {
        $this->vue->afficheAccueilConventionStage();
    }

}