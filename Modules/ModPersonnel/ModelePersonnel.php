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
        $req->bindParam("name", $id);
        $req->bindParam("email", $email);
        $req->execute();
        return $req->fetch();
    }

    public function verifPassword($data) {
        $req = self::$bdd->prepare("SELECT password from tuteur_pedagogique WHERE id = :id and email = :email;");
        $req->bindParam("name",$data['id']);
        $req->bindParam("email",$data['email']);
        $req->execute();
        return $req->$data['password'];
    }

    public function updateUser($data){
        $req = self::$bdd->prepare("update tuteur_pedagogique set password = :password where id :id and email = :email;");
        $req->bindParam('name',$data['nom']);
        $req->bindParam('email',$data['email']);
        $req->bindParam('password',$data['password']);
        $req->execute();
    }

}