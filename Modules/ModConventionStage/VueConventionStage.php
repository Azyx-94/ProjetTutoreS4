<?php

class VueConventionStage
{

    public function __construct() {

    }

    public function afficheAccueilConventionStage() {
        $this->render("ConventionStage.html");
    }

    public function affichePDF() {
        $this->render("PDF.html");
    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}