<?php
include_once 'ContPersonnel.php';
class ModPersonnel
{
    private $action;
    private $controleur;

    public function __construct() {
        $this->controleur= new ContPersonnel();
        $this->action = $this->setAction();
        $this->render($this->action);
    }

    public function setAction() {
        if(!isset($_GET['action'])){
            $_GET['action'] = "liste";
        }
        return $_GET["action"];
    }

    public function render($toDO) {
        switch ($toDO) {
            case "inscription":
                $this->controleur->inscription();
                break;
            case "inscriptionForm":
                $this->controleur->inscriptionForm();
                break;
            case "connexionForm":
                $this->controleur->connexionform();
                break;
                /*
            case "deconnexion":
                $this->controleur->deconnexion();
                break;
                */
            default:
                $this->controleur->connexion();
                break;
        }
    }

}