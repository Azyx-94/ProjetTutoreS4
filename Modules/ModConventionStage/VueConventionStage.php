<?php

class VueConventionStage
{

    public function __construct() {

    }

    public function afficheAccueilConventionStage() {
        $this->render("FichiersHTML/ConventionStage.html");
    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}