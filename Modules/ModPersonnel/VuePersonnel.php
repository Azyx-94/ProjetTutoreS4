<?php

class VuePersonnel
{

    public function __construct() {

    }

    public function inscription() {
        $this->render("FichiersHTML/Inscription.html");
    }

    public function connexion() {
        $this->render("FichiersHTML/Connexion.html");
    }

    public function interfaceCompte() {
        $this->render("FichiersHTML/Personnel.html");
    }

    public function listeConventionStage($tab) {
        $this->render("FichiersHTML/listeConventionStage.php");
        if(isset($tab) && !empty($tab)){
            foreach ($tab as $value){
                echo "<div>Convention n°".$value->convention_stage_id." de l'étudiant : " .$value->nom .$value->prenom.".<br>Url de la convention : ".$value->url. "</div>";
            }
        }
    }

    public function deconnexion() {
        $this->render("FichiersHTML/Deconnexion.html");
    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}