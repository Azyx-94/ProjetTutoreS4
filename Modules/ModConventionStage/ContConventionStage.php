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

                $a = explode("\n", $textWithLineBreaks);
                echo'<br>';
                $toutesMesDonnees = array();
                foreach($a as $val) {
                    $data = explode(':', $val);
                    if($data[1] != null)
                        array_push($toutesMesDonnees, $data[1]);
                }
                $this->modele->insererEtudiant($toutesMesDonnees);
                $this->modele->insererEntreprise($toutesMesDonnees);

                $this->modele->insererTuteurEntreprise($toutesMesDonnees);
                $this->modele->insererTuteurPedagogique($toutesMesDonnees);
                /*
                $dossierPdf = "./upload/$pdf";
                $this->modele->insererConventionStage($dossierPdf);
                */
                /*
                $this->modele->insererStage($toutesMesDonnees);
                */
            }
            else {
                echo 'Echec de l\'upload !';
            }
        }

    }

}