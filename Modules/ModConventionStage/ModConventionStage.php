<?php
include_once 'ContConventionStage.php';
class ModConventionStage
{

    private $controleur;

    public function __construct() {
        $this->controleur= new ContConventionStage();
        $this->controleur->afficheAccueilConventionStage();
    }


}