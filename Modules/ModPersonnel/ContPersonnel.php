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

    public function inscription() {
        $this->vue->inscription();
    }

    public function inscriptionForm() {
        if (empty($_POST['id']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['password2'])) { // BON
            $this->vue->render("FichiersHTML/formVide.html");
        }
        else if(($_POST['password']) != ($_POST['password2'])) {
            $this->vue->render("FichiersHTML/motsDePasseDifferents.html");
        }
        else {
            $id = htmlspecialchars($_POST['id']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $user = $this->modele->getUser($id, $email);
            if (empty($user)) {
                $this->vue->render("FichiersHTML/identifiantOuEmailIncorrects.html");
            }
            else {
                $data = array('id' => $id, 'email' => $email);
                $passwordIsNull = $this->modele->verifPassword($data);
                if ($passwordIsNull == NULL) { // NE MARCHE PAS
                    $password = password_hash($password, PASSWORD_ARGON2I);
                    $data = array('id' => $id, 'email' => $email, 'password'=> $password);
                    $this->modele->updateUser($data);
                    $this->vue->render("FichiersHTML/formGood.html");
                }
                else {
                    $this->vue->render("FichiersHTML/motDePasseDejaCree.html");
                }
            }
        }
    }

    public function connexion() {
        $this->vue->connexion();
    }

    public function connexionForm() {
        if (empty($_POST['password'])) {
            $this->vue->render("FichiersHTML/formVide.html");
        }
        else {
            $id = htmlspecialchars($_POST['id']);
            $password = htmlspecialchars($_POST['password']);
            $user = $this->modele->getUserId($id);
            if (empty($user)) {
                $this->vue->render("FichiersHTML/identifiantIncorrect.html");
            }
            else {
                $verifPassword = password_verify($password, $user->password);
                if ($verifPassword == false) {
                    $this->vue->render("FichiersHTML/motDePasseIncorrect.html");
                }
                else {
                    $_SESSION['login'] = $id;
                    $this->vue->render("FichiersHTML/Personnel.html");
                }
            }
        }
    }

    public function deconnexion() {
        $this->vue->deconnexion();
    }

}