<?php
require_once "./Modules/ModConventionStage/ModeleConventionStage.php";
require_once "./Modules/ModConventionStage/VueConventionStage.php";
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/

class ContConventionStage
{

    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleConventionStage();
        $this->vue = new VueConventionStage();
    }

    public function afficheAccueilConventionStage() {
        $this->vue->afficheAccueilConventionStage();
    }

    public function envoiPDF() {
        $dossier = 'upload/';
        $fichier = basename($_FILES['fichierConvention']['name']);
        $extensions = array('.pdf');
        $extension = strrchr($_FILES['fichierConvention']['name'], '.');

        if(!in_array($extension, $extensions)) {
            $this->vue->render("FichiersHTML/ErreurFichier.html");
        }
        else {
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            if(move_uploaded_file($_FILES['fichierConvention']['tmp_name'], $dossier . $fichier)) {
                echo 'Upload effectué avec succès !';
            }
            else {
                echo 'POURQUOI SA MARCHE PAS FRERE...';
            }
        }
    }

}