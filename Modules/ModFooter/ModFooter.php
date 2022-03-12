<?php
include_once 'ContFooter.php';
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/

class ModFooter
{

    private $action;
    private $controleur;

    public function __construct() {
        $this->controleur = new ContFooter();
        $this->controleur->afficheFooter();
    }

}