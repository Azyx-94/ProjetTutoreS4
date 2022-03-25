<?php
require_once "DonneesManquantes.php";
class ModeleConventionStage extends Connexion
{

    public function __construct() {

    }

    /**
     * @throws DonneesManquantes
     */

    public function insererEtudiant($data) {
        $inserted = null;
        self::$bdd->beginTransaction();
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
        try {
            $req->execute();
        } catch(PDOException $d){
            throw new DonneesManquantes();
        }
        $inserted = self::$bdd->lastInsertId();
        self::$bdd->commit();
        if($inserted ===null)
            throw new DonneesManquantes();
        return $inserted;
    }

    public function insererConventionStage($dossierPdf) {
        self::$bdd->beginTransaction();
        $req = self::$bdd->prepare("INSERT into convention_stage (url) values (:url);");
        $req->bindParam("url",$dossierPdf);
        try {
            $req->execute();
        } catch(PDOException $d){
            throw new DonneesManquantes();
        }
        $inserted = self::$bdd->lastInsertId();
        self::$bdd->commit();
        if($inserted ===null)
            throw new DonneesManquantes();
        return $inserted;
    }

    public function insererStage($data) {
        self::$bdd->beginTransaction();
        $req = self::$bdd->prepare("INSERT into stage (description, adresse, duree, debutStage, finStage, codePostal, ville) 
        values (:description, :adresse, :duree, :debutStage, :finStage, :codePostal, :ville);");
        $req->bindParam("description",$data[13]);
        $req->bindParam("adresse",$data[14]);
        $req->bindParam("duree",$data[20]);
        $req->bindParam("debutStage", $data[18]);
        $req->bindParam("finStage",$data[19]);
        $req->bindParam("codePostal",$data[15]);
        $req->bindParam("ville",$data[16]);
        try {
            $req->execute();
        } catch(PDOException $d){
            throw new DonneesManquantes();
        }
        $inserted = self::$bdd->lastInsertId();
        self::$bdd->commit();
        if($inserted ===null)
            throw new DonneesManquantes();
        return $inserted;
    }

    public function insererEntreprise($data) {
        self::$bdd->beginTransaction();
        $req = self::$bdd->prepare("INSERT into entreprise (nom, telephone, mail) 
        values (:nom, :telephone, :mail);");
        $req->bindParam("nom",$data[10]);
        $req->bindParam("telephone",$data[11]);
        $req->bindParam("mail",$data[12]);
        try {
            $req->execute();
        } catch(PDOException $d){
            throw new DonneesManquantes();
        }
        $inserted = self::$bdd->lastInsertId();
        self::$bdd->commit();
        if($inserted ===null)
            throw new DonneesManquantes();
        return $inserted;
    }

    public function insererTuteurEntreprise($data) {
        self::$bdd->beginTransaction();
        $req = self::$bdd->prepare("INSERT into tuteur_stage (nom, prenom, email, telephone) 
        values (:nom, :prenom, :email, :telephone);");
        $req->bindParam("nom",$data[21]);
        $req->bindParam("prenom",$data[22]);
        $req->bindParam("email",$data[24]);
        $req->bindParam("telephone",$data[23]);
        try {
            $req->execute();
        } catch(PDOException $d){
            throw new DonneesManquantes();
        }
        $inserted = self::$bdd->lastInsertId();
        self::$bdd->commit();
        if($inserted ===null)
            throw new DonneesManquantes();
        return $inserted;
    }

    public function insererTuteurPedagogique($data) {
        self::$bdd->beginTransaction();
        $req = self::$bdd->prepare("INSERT into tuteur_pedagogique (nom, prenom, email, telephone) 
        values (:nom, :prenom, :email,:telephone);");
        $req->bindParam("nom",$data[25]);
        $req->bindParam("prenom",$data[26]);
        $req->bindParam("email",$data[28]);
        $req->bindParam("telephone",$data[27]);
        try {
            $req->execute();
        } catch(PDOException $d){
            throw new DonneesManquantes();
        }
        $inserted = self::$bdd->lastInsertId();
        self::$bdd->commit();
        if($inserted ===null)
            throw new DonneesManquantes();
        return $inserted;
    }

    public function insererConventionStageEtudiant($convention_stage_id, $numeroEtudiant) {
        $req = self::$bdd->prepare("INSERT into convention_stage_etudiant values ($convention_stage_id,$numeroEtudiant);");
        $req->execute();
        return $req->fetch();
    }

    public function insererEtudiantStage($numeroEtudiant, $id_stage) {
        $req = self::$bdd->prepare("INSERT into etudiant_stage values ($numeroEtudiant, $id_stage);");
        $req->execute();
        return $req->fetch();
    }

    public function insererEntrepriseStage($id_entreprise, $id_stage) {
        $req = self::$bdd->prepare("INSERT into entreprise_stage values ($id_entreprise, $id_stage);");
        $req->execute();
        return $req->fetch();
    }

    public function insererEntrepriseTuteurStage($id_entreprise, $id_tuteur_stage) {
        $req = self::$bdd->prepare("INSERT into entreprise_tuteur_stage values ($id_entreprise,$id_tuteur_stage);");
        $req->execute();
        return $req->fetch();
    }

}