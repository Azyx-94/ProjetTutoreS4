<?php

class VueAccueil
{

    public function __construct() {

    }

    public function afficheAccueil() {
        $this->render("Accueil.html");
    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}