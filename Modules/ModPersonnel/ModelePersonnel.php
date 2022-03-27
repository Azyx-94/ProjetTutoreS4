<?php
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
include_once 'Connexion.php';
class ModelePersonnel extends Connexion
{

    public function getUser($id, $email){
        $req = self::$bdd->prepare("SELECT * FROM tuteur_pedagogique WHERE id = :id and email = :email;");
        $req->bindParam("id", $id);
        $req->bindParam("email", $email);
        $req->execute();
        return $req->fetch();
    }

    public function getUserId($id){
        $req = self::$bdd->prepare("SELECT * FROM tuteur_pedagogique WHERE id = :id;");
        $req->bindParam("id", $id);
        $req->execute();
        return $req->fetch();
    }

    public function verifPassword($data) {
        $req = self::$bdd->prepare("SELECT password from tuteur_pedagogique WHERE id = :id and email = :email;");
        $req->bindParam("id", $data['id']);
        $req->bindParam("email", $data['email']);
        $req->execute();
        return $req->fetch();
    }

    public function updateUser($data){
        $req = self::$bdd->prepare("update tuteur_pedagogique set password = :password where id =:id and email = :email;");
        $req->bindParam("id",$data['id']);
        $req->bindParam("email",$data['email']);
        $req->bindParam("password",$data['password']);
        $req->execute();
    }

    public function listeConventionStage() {
        $req = self::$bdd->prepare("SELECT * FROM etudiant join convention_stage;");
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }

}