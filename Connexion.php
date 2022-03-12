<?php

class Connexion
{

    static protected $bdd = NULL;

    public static function initConnexion() {
        $username = "root";
        $password = "root";
        $dns = "mysql:host=localhost;dbname=projet";
        try {
            self::$bdd = new PDO($dns, $username, $password);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}