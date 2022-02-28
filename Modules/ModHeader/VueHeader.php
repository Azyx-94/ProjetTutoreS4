<?php
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/

class VueHeader
{

    public function __construct() {

    }

    public function afficheHeader() {
        $this->render('Header.html');
    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}