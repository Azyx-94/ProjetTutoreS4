<?php
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
include_once 'ModeleHeader.php';
include_once 'VueHeader.php';

class ContHeader
{

    private $modele;
    private $vue;

    public function __construct () {
        $this->modele = new ModeleHeader();
        $this->vue = new VueHeader();
    }

    public function afficheHeader() {
        $this->vue->afficheHeader();
    }

}