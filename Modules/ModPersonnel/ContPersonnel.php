<?php
require_once "./Modules/ModPersonnel/ModelePersonnel.php";
require_once "./Modules/ModPersonnel/VuePersonnel.php";
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
class ContPersonnel
{

    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModelePersonnel();
        $this->vue = new VuePersonnel();
    }

    public function connexion() {
        $this->vue->connexion();
    }

    public function connexionForm() {
        $this->vue->connexionForm();
    }

    public function inscription() {
        $this->vue->inscription();
    }

    public function inscriptionForm() {
        $this->vue->inscriptionForm();
    }

}