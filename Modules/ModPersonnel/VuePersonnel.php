<?php

class VuePersonnel
{

    public function __construct() {

    }

    public function inscription() {
        $this->render("FichiersHTML/Inscription.html");
    }

    public function connexion() {
        $this->render("FichiersHTML/Connexion.html");
    }

    public function interfaceCompte() {
        $this->render("FichiersHTML/Personnel.html");
    }

    public function deconnexion() {
        $this->render("FichiersHTML/Deconnexion.html");
    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}