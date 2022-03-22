<?php

class ModeleConventionStage extends Connexion
{

    public function __construct() {

    }

    public function insererEtudiant($data) {
        $req = self::$bdd->prepare("INSERT into etudiant (nom, prenom, dateDeNaissance, sexe, adresse, codePostal, ville, telephone, mail, diplome) 
        values (:nom, :prenom, :dateDeNaissance, :sexe, :adresse, :codePostal, :ville, :telephone, :mail, :diplome);");
        $req->bindParam("nom",$data[0]);
        $req->bindParam("prenom",$data[1]);
        $req->bindParam("dateDeNaissance",$data[2]);;
        $req->bindParam("sexe",$data[3]);
        $req->bindParam("adresse",$data[4]);
        $req->bindParam("codePostal",$data[5]);
        $req->bindParam("ville",$data[6]);
        $req->bindParam("telephone",$data[7]);
        $req->bindParam("mail",$data[8]);
        $req->bindParam("diplome",$data[9]);
        $req->execute();
        return $req->fetch();
    }

    public function insererEntreprise($data) {
        $req = self::$bdd->prepare("INSERT into entreprise (nom, telephone, mail) 
        values (:nom, :telephone, :mail);");
        $req->bindParam("nom",$data[10]);
        $req->bindParam("telephone",$data[11]);
        $req->bindParam("mail",$data[12]);
        $req->execute();
        return $req->fetch();
    }

    public function insererStage($data) {
        $req = self::$bdd->prepare("INSERT into stage (description, adresse, duree, debutStage, finStage, codePostal, ville) 
        values (:description, :adresse, :duree, :debutStage, :finStage, :codePostal, :ville);");
        $req->bindParam("description",$data[13]);
        $req->bindParam("adresse",$data[14]);
        $req->bindParam("duree",$data[20]);
        $req->bindParam("debutStage", $data[18]);
        $req->bindParam("finStage",$data[19]);
        $req->bindParam("codePostal",$data[15]);
        $req->bindParam("ville",$data[16]);
        $req->execute();
        return $req->fetch();
    }

    public function insererTuteurEntreprise($data) {
        $req = self::$bdd->prepare("INSERT into tuteur_stage (nom, prenom, email, telephone) 
        values (:nom, :prenom, :email, :telephone);");
        $req->bindParam("nom",$data[21]);
        $req->bindParam("prenom",$data[22]);
        $req->bindParam("email",$data[24]);
        $req->bindParam("telephone",$data[23]);
        $req->execute();
        return $req->fetch();
    }

    public function insererTuteurPedagogique($data) {
        $req = self::$bdd->prepare("INSERT into tuteur_pedagogique (nom, prenom, email, telephone) 
        values (:nom, :prenom, :email,:telephone);");
        $req->bindParam("nom",$data[25]);
        $req->bindParam("prenom",$data[26]);
        $req->bindParam("email",$data[28]);
        $req->bindParam("telephone",$data[27]);
        $req->execute();
        return $req->fetch();
    }

    public function insererConventionStage($dossierPdf) {
        $req = self::$bdd->prepare("INSERT into convention_stage (url) 
        values (:url);");
        $req->bindParam("url",$dossierPdf);
        $req->execute();
        return $req->fetch();
    }



}