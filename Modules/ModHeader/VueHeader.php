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
        echo
        '<h1>TROUVE TON STAGE</h1>
        <div id="image">
            <img src="./Images/Valise.png" alt="" />
        </div>';
    }

}