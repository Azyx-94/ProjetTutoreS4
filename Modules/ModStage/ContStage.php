<?php
require_once "./Modules/ModStage/ModeleStage.php";
require_once "./Modules/ModStage/VueStage.php";
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
class ContStage
{

    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleStage();
        $this->vue = new VueStage();
    }

    public function afficheListeStage() {
        $this->tab = $this->modele->afficheListeStage();
        $this->vue->afficheListeStage($this->tab);
    }

}