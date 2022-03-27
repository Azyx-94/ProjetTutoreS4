<?php
include_once 'ContStage.php';
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/

class ModStage
{

    public function __construct() {
        $this->controleur= new ContStage();
        $this->controleur->afficheListeStage();
    }

}