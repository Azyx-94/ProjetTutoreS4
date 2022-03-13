<?php
require_once "./Modules/ModPersonnel/ModelePersonnel.php";
require_once "./Modules/ModPersonnel/VuePersonnel.php";
/*
if (!defined('CONST_INCLUDE'))
    die ('Acces direct interdit !');
*/
class ContPersonnel
{

    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModelePersonnel();
        $this->vue = new VuePersonnel();
    }

    public function connexion() {
        $this->vue->connexion();
    }

    public function connexionForm() {

    }

    public function inscription() {
        $this->vue->inscription();
    }

    public function inscriptionForm() {
        if (empty($_POST['id']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['password2'])) { // BON
            $this->vue->render("FichiersHTML/formVide.html");
        }
        else if(($_POST['password']) != ($_POST['password2'])) { // BON
            $this->vue->render("FichiersHTML/motsDePasseDifferents.html");
        }
        else { // NON
            $id = htmlspecialchars($_POST['id']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $user = $this->modele->getUser($id, $email);
            if (empty($user)) {
                $this->vue->render("FichiersHTML/identifantIncorrect.html");
            }
            /*
            else {
                $password = password_hash($password, PASSWORD_ARGON2I);
                $data = array('name' => $id, 'e-mail' => $email, 'password' => $password);
                $verifPassword = $this->modele->verifPassword($data);
                if ($verifPassword != null) {
                    $this->vue->render("FichiersHTML/motDePasseDejaCree.html");
                } else {
                    $this->modele->updateUser($data);
                    $this->vue->render("FichiersHTML/formGood.html");
                }
            }
            */
        }
    }

    public function deconnexion() {
        $this->vue->deconnexion();
    }

}