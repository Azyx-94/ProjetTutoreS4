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
        $pdf = basename($_FILES['fichierConvention']['name']);
        $extensions = array('.pdf');
        $extension = strrchr($_FILES['fichierConvention']['name'], '.');

        if(!in_array($extension, $extensions)) {
            $this->vue->render("FichiersHTML/ErreurFichier.html");
        }
        else {
            $pdf = strtr($pdf,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $pdf = preg_replace('/([^.a-z0-9]+)/i', '-', $pdf);

            if(move_uploaded_file($_FILES['fichierConvention']['tmp_name'], $dossier . $pdf)) {
                include("./DOSSIER-PDF2TEXT/PdfToText.phpclass");
                $pdf = new PdfToText("./upload/$pdf");
                $text = $pdf->Text;
                $textWithLineBreaks = nl2br($text);
                echo $textWithLineBreaks;

                $a = explode("\n", $textWithLineBreaks);
                var_dump($a);
                echo'<br>';
                $toutesMesDonnees = array();
                foreach($a as $val) { // J'avoue j'ai oublié la syntaxe du foreach en PHP
                    $data = explode(':', $val); // Retourne ["nom", "ISSA"] et moi je veux que ISSA
                    array_push($toutesMesDonnees, $data[1]); // $data[1] c'est le deuxieme élément (ce qui est après le ':')
                }
                var_dump($toutesMesDonnees);





            }
            else {
                echo 'Echec de l\'upload !';
            }
        }

    }

}