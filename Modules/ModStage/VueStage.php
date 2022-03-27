<?php

class VueStage
{

    public function __construct() {

    }

    public function afficheListeStage($tab) {
        echo "<section class ='listeInfosStage'>";
        if(isset($tab) && !empty($tab)){
            foreach ($tab as $value){
                echo "<p class ='infosStage'>L'étudiant $value->nom $value->prenom a fait un stage chez l'entreprise $value->nomEntreprise.</p>";
                echo "<p class ='infosStage'>Description du stage : $value->description. Adresse : $value->adresseStage, code postal : $value->codePostalStage, ville : $value->villeStage.</br></p>";
            }
        }
        else {
            echo"<p class ='aucunStage'>Il n'y a aucun stage recensé pour le moment</p>";
        }
        echo "</section>";
    }

}