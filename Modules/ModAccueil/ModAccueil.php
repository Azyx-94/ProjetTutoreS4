<?php
include_once 'ContAccueil.php';
class ModAccueil
{
    private $controleur;

    public function __construct() {
        $this->controleur= new ContAccueil();
        $this->controleur->afficheAccueil();
    }

}