<?php

class VuePersonnel
{

    public function __construct() {

    }


    public function connexion() {
        $this->render("FichiersHTML/Connexion.html");
    }

    public function inscription() {
        $this->render("FichiersHTML/Inscription.html");
    }


    public function deconnexion() {

    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}