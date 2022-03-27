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

    function replaceSpecialChar($str) {
        $ch0 = array(
            "œ"=>"oe",
            "Œ"=>"OE",
            "æ"=>"ae",
            "Æ"=>"AE",
            "À" => "A",
            "Á" => "A",
            "Â" => "A",
            "à" => "A",
            "Ä" => "A",
            "Å" => "A",
            "&#256;" => "A",
            "&#258;" => "A",
            "&#461;" => "A",
            "&#7840;" => "A",
            "&#7842;" => "A",
            "&#7844;" => "A",
            "&#7846;" => "A",
            "&#7848;" => "A",
            "&#7850;" => "A",
            "&#7852;" => "A",
            "&#7854;" => "A",
            "&#7856;" => "A",
            "&#7858;" => "A",
            "&#7860;" => "A",
            "&#7862;" => "A",
            "&#506;" => "A",
            "&#260;" => "A",
            "à" => "a",
            "á" => "a",
            "â" => "a",
            "à" => "a",
            "ä" => "a",
            "å" => "a",
            "&#257;" => "a",
            "&#259;" => "a",
            "&#462;" => "a",
            "&#7841;" => "a",
            "&#7843;" => "a",
            "&#7845;" => "a",
            "&#7847;" => "a",
            "&#7849;" => "a",
            "&#7851;" => "a",
            "&#7853;" => "a",
            "&#7855;" => "a",
            "&#7857;" => "a",
            "&#7859;" => "a",
            "&#7861;" => "a",
            "&#7863;" => "a",
            "&#507;" => "a",
            "&#261;" => "a",
            "Ç" => "C",
            "&#262;" => "C",
            "&#264;" => "C",
            "&#266;" => "C",
            "&#268;" => "C",
            "ç" => "c",
            "&#263;" => "c",
            "&#265;" => "c",
            "&#267;" => "c",
            "&#269;" => "c",
            "Ð" => "D",
            "&#270;" => "D",
            "&#272;" => "D",
            "&#271;" => "d",
            "&#273;" => "d",
            "È" => "E",
            "É" => "E",
            "Ê" => "E",
            "Ë" => "E",
            "&#274;" => "E",
            "&#276;" => "E",
            "&#278;" => "E",
            "&#280;" => "E",
            "&#282;" => "E",
            "&#7864;" => "E",
            "&#7866;" => "E",
            "&#7868;" => "E",
            "&#7870;" => "E",
            "&#7872;" => "E",
            "&#7874;" => "E",
            "&#7876;" => "E",
            "&#7878;" => "E",
            "è" => "e",
            "é" => "e",
            "ê" => "e",
            "ë" => "e",
            "&#275;" => "e",
            "&#277;" => "e",
            "&#279;" => "e",
            "&#281;" => "e",
            "&#283;" => "e",
            "&#7865;" => "e",
            "&#7867;" => "e",
            "&#7869;" => "e",
            "&#7871;" => "e",
            "&#7873;" => "e",
            "&#7875;" => "e",
            "&#7877;" => "e",
            "&#7879;" => "e",
            "&#284;" => "G",
            "&#286;" => "G",
            "&#288;" => "G",
            "&#290;" => "G",
            "&#285;" => "g",
            "&#287;" => "g",
            "&#289;" => "g",
            "&#291;" => "g",
            "&#292;" => "H",
            "&#294;" => "H",
            "&#293;" => "h",
            "&#295;" => "h",
            "Ì" => "I",
            "Í" => "I",
            "Î" => "I",
            "Ï" => "I",
            "&#296;" => "I",
            "&#298;" => "I",
            "&#300;" => "I",
            "&#302;" => "I",
            "&#304;" => "I",
            "&#463;" => "I",
            "&#7880;" => "I",
            "&#7882;" => "I",
            "&#308;" => "J",
            "&#309;" => "j",
            "&#310;" => "K",
            "&#311;" => "k",
            "&#313;" => "L",
            "&#315;" => "L",
            "&#317;" => "L",
            "&#319;" => "L",
            "&#321;" => "L",
            "&#314;" => "l",
            "&#316;" => "l",
            "&#318;" => "l",
            "&#320;" => "l",
            "&#322;" => "l",
            "Ñ" => "N",
            "&#323;" => "N",
            "&#325;" => "N",
            "&#327;" => "N",
            "ñ" => "n",
            "&#324;" => "n",
            "&#326;" => "n",
            "&#328;" => "n",
            "&#329;" => "n",
            "Ò" => "O",
            "Ó" => "O",
            "Ô" => "O",
            "Õ" => "O",
            "Ö" => "O",
            "Ø" => "O",
            "&#332;" => "O",
            "&#334;" => "O",
            "&#336;" => "O",
            "&#416;" => "O",
            "&#465;" => "O",
            "&#510;" => "O",
            "&#7884;" => "O",
            "&#7886;" => "O",
            "&#7888;" => "O",
            "&#7890;" => "O",
            "&#7892;" => "O",
            "&#7894;" => "O",
            "&#7896;" => "O",
            "&#7898;" => "O",
            "&#7900;" => "O",
            "&#7902;" => "O",
            "&#7904;" => "O",
            "&#7906;" => "O",
            "ò" => "o",
            "ó" => "o",
            "ô" => "o",
            "õ" => "o",
            "ö" => "o",
            "ø" => "o",
            "&#333;" => "o",
            "&#335;" => "o",
            "&#337;" => "o",
            "&#417;" => "o",
            "&#466;" => "o",
            "&#511;" => "o",
            "&#7885;" => "o",
            "&#7887;" => "o",
            "&#7889;" => "o",
            "&#7891;" => "o",
            "&#7893;" => "o",
            "&#7895;" => "o",
            "&#7897;" => "o",
            "&#7899;" => "o",
            "&#7901;" => "o",
            "&#7903;" => "o",
            "&#7905;" => "o",
            "&#7907;" => "o",
            "ð" => "o",
            "&#340;" => "R",
            "&#342;" => "R",
            "&#344;" => "R",
            "&#341;" => "r",
            "&#343;" => "r",
            "&#345;" => "r",
            "&#346;" => "S",
            "&#348;" => "S",
            "&#350;" => "S",
            "&#347;" => "s",
            "&#349;" => "s",
            "&#351;" => "s",
            "&#354;" => "T",
            "&#356;" => "T",
            "&#358;" => "T",
            "&#355;" => "t",
            "&#357;" => "t",
            "&#359;" => "t",
            "Ù" => "U",
            "Ú" => "U",
            "Û" => "U",
            "Ü" => "U",
            "&#360;" => "U",
            "&#362;" => "U",
            "&#364;" => "U",
            "&#366;" => "U",
            "&#368;" => "U",
            "&#370;" => "U",
            "&#431;" => "U",
            "&#467;" => "U",
            "&#469;" => "U",
            "&#471;" => "U",
            "&#473;" => "U",
            "&#475;" => "U",
            "&#7908;" => "U",
            "&#7910;" => "U",
            "&#7912;" => "U",
            "&#7914;" => "U",
            "&#7916;" => "U",
            "&#7918;" => "U",
            "&#7920;" => "U",
            "ù" => "u",
            "ú" => "u",
            "û" => "u",
            "ü" => "u",
            "&#361;" => "u",
            "&#363;" => "u",
            "&#365;" => "u",
            "&#367;" => "u",
            "&#369;" => "u",
            "&#371;" => "u",
            "&#432;" => "u",
            "&#468;" => "u",
            "&#470;" => "u",
            "&#472;" => "u",
            "&#474;" => "u",
            "&#476;" => "u",
            "&#7909;" => "u",
            "&#7911;" => "u",
            "&#7913;" => "u",
            "&#7915;" => "u",
            "&#7917;" => "u",
            "&#7919;" => "u",
            "&#7921;" => "u",
            "&#372;" => "W",
            "&#7808;" => "W",
            "&#7810;" => "W",
            "&#7812;" => "W",
            "&#373;" => "w",
            "&#7809;" => "w",
            "&#7811;" => "w",
            "&#7813;" => "w",
            "Ý" => "Y",
            "&#374;" => "Y",
            "?" => "Y",
            "&#7922;" => "Y",
            "&#7928;" => "Y",
            "&#7926;" => "Y",
            "&#7924;" => "Y",
            "ý" => "y",
            "ÿ" => "y",
            "&#375;" => "y",
            "&#7929;" => "y",
            "&#7925;" => "y",
            "&#7927;" => "y",
            "&#7923;" => "y",
            "&#377;" => "Z",
            "&#379;" => "Z"
        );
        $str = strtr($str,$ch0);
        return $str;
    }

    public function envoiPDF() {
        $dossier = 'upload/';
        $pdf = basename($_FILES['fichierConvention']['name']);
        $extensions = array('.pdf');
        $extension = strrchr($_FILES['fichierConvention']['name'], '.');

        if (!in_array($extension, $extensions)) {
            $this->vue->render("FichiersHTML/ErreurFichier.html");
        }

        else {
            $pdf = $this->replaceSpecialChar($pdf);
            $pdf = preg_replace('/([^.a-z0-9]+)/i', '-', $pdf);
            $nomPdf = $pdf;
            $pathPdf = "./upload/$nomPdf";
            if(file_exists($pathPdf)) {
                $this->vue->render("FichiersHTML/FichierDejaExistant.html");
            }
            else {
                if (move_uploaded_file($_FILES['fichierConvention']['tmp_name'], $dossier . $pdf)) {
                    include("./DOSSIER-PDF2TEXT/PdfToText.phpclass");
                    $pdf = new PdfToText("./upload/$pdf");
                    $text = $pdf->Text;
                    $textWithLineBreaks = nl2br($text);
                    $ligne = explode("\n", $textWithLineBreaks);
                    $donnees = array();
                    foreach ($ligne as $val) {
                        $data = explode(':', $val);
                        if (array_key_exists(1, $data)) {
                            $dataVal2 = $this->replaceSpecialChar($data[1]);
                            $dataVal1 = str_replace("<br />", "", $dataVal2);
                            $dataVal = str_replace("  ", "", $dataVal1);
                            array_push($donnees, $dataVal);
                        }
                    }
                    try {
                        $numeroEtudiant = $this->modele->insererEtudiant($donnees);
                        $convention_stage_id = $this->modele->insererConventionStage($pathPdf);
                        $id_stage = $this->modele->insererStage($donnees);
                        $id_entreprise = $this->modele->insererEntreprise($donnees);
                        $id_tuteur_stage = $this->modele->insererTuteurEntreprise($donnees);
                        $this->modele->insererTuteurPedagogique($donnees);
                        $this->modele->insererConventionStageEtudiant($convention_stage_id, $numeroEtudiant);
                        $this->modele->insererEtudiantStage($numeroEtudiant, $id_stage);
                        $this->modele->insererEntrepriseStage($id_entreprise, $id_stage);
                        $this->modele->insererEntrepriseTuteurStage($id_entreprise, $id_tuteur_stage);
                    } catch (DonneesManquantes $d) {
                        $this->vue->render("FichiersHTML/ErreurDonnees.html");
                    }
                    $this->vue->render("FichiersHTML/ConventionStageInseree.html");
                } else {
                    echo "Echec de l'upload !";
                }
            }

        }

    }

}