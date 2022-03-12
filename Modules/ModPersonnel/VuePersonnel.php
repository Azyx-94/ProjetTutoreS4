<?php

class VuePersonnel
{

    public function __construct() {

    }


    public function connexion() {
        $this->render("Connexion.html");
    }

    public function connexionForm() {

    }

    public function inscription() {
        $this->render("Inscription.html");
    }

    public function inscriptionForm() {

    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}