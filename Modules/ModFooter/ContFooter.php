<?php
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
include_once 'ModeleFooter.php';
include_once 'VueFooter.php';
class ContFooter
{

    private $modele;
    private $vue;

    public function __construct () {
        $this->modele = new ModeleFooter();
        $this->vue = new VueFooter();
    }

    public function afficheFooter() {
        $this->vue->afficheFooter();
    }

}