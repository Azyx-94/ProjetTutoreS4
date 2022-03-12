<?php
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
class VueFooter
{

    public function __construct() {

    }

    public function afficheFooter() {
        $this->render('Footer.html');
    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}