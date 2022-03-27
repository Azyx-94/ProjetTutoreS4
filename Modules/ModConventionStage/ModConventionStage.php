<?php
include_once 'ContConventionStage.php';
class ModConventionStage
{

    private $action;
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContConventionStage();
        $this->action = $this->setAction();
        $this->render($this->action);
    }

    public function setAction()
    {
        if (!isset($_GET['action'])) {
            $_GET['action'] = "liste";
        }
        return $_GET["action"];
    }

    public function render($toDO) {
        switch ($toDO) {
            case "envoiPDF":
                $this->controleur->envoiPDF();
                break;
            default:
                $this->controleur->afficheAccueilConventionStage();
                break;
        }
    }
}