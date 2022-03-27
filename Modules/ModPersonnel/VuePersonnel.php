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
        echo "<section class ='listeLiensConventions'>";
        echo "<div>";
        echo "<br>";
        if(isset($tab) && !empty($tab)){
            foreach ($tab as $value){
                echo "<a class ='liensConventions' href='$value->url'>--> Convention de l'étudiant : $value->nom $value->prenom</a></br>";
            }
        }
        else {
            echo"<p class ='aucuneConvention'> Il n'y a aucune convention de stage déposé pour le moment</p>";
        }
        echo "</div>";
        echo "</section>";
    }

    public function deconnexion() {
        $this->render("FichiersHTML/Deconnexion.html");
    }

    public function render($path,$data=null) {
        include_once "$path";
    }

}