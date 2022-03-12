<?php

include_once 'ContHeader.php';
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/

class ModHeader
{
    private $action;
    private $controleur;

    public function __construct() {
        $this->controleur = new ContHeader();
        $this->controleur->afficheHeader();
    }

}