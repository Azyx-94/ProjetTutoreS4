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
            $nomPdf = $pdf;

            if(move_uploaded_file($_FILES['fichierConvention']['tmp_name'], $dossier . $pdf)) {
                include("./DOSSIER-PDF2TEXT/PdfToText.phpclass");
                $pdf = new PdfToText("./upload/$pdf");
                $text = $pdf->Text;
                $textWithLineBreaks = nl2br($text);

                $a = explode("\n", $textWithLineBreaks); // Une ligne
                $donnees = array();
                foreach($a as $val) {
                    $data = explode(':', $val); // On sépare les mots de chaque ligne par les :
                    if (array_key_exists(1,$data)) {
                        $dataVal1 = str_replace("  ","",$data[1]);
                        $dataVal = str_replace("<br />","",$dataVal1);
                        array_push($donnees, $dataVal);
                    }
                }
                try {
                    $numeroEtudiant = $this->modele->insererEtudiant($donnees);
                    $pathPdf = "./upload/$nomPdf";
                    $convention_stage_id = $this->modele->insererConventionStage($pathPdf);
                    $id_stage = $this->modele->insererStage($donnees);
                    $id_entreprise = $this->modele->insererEntreprise($donnees);
                    $id_tuteur_stage = $this->modele->insererTuteurEntreprise($donnees);
                    $this->modele->insererTuteurPedagogique($donnees);
                    $this->modele->insererConventionStageEtudiant($convention_stage_id, $numeroEtudiant);
                    $this->modele->insererEtudiantStage($numeroEtudiant, $id_stage);
                    $this->modele->insererEntrepriseStage($id_entreprise, $id_stage);
                    $this->modele->insererEntrepriseTuteurStage($id_entreprise, $id_tuteur_stage);
                } catch(DonneesManquantes $d) {
                    $this->vue->render("FichiersHTML/ErreurDonnees.html");
                }
                $this->vue->render("FichiersHTML/ConventionStageInseree.html");
            }
            else {
                echo 'Echec de l\'upload !';
            }
        }

    }

}