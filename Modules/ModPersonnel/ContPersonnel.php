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
    private $tab;

    public function __construct() {
        $this->modele =new ModelePersonnel();
        $this->vue =new VuePersonnel();
    }

    public function inscription() {
        $this->vue->inscription();
    }

    public function inscriptionForm() {
        if (empty($_POST['id']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['password2'])) {
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
                $passwordDb = $this->modele->verifPassword($data);
                if ($passwordDb->password==null) {
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
        if(isset($_SESSION['id'])) {
            $this->vue->render("FichiersHTML/Personnel.html");
        }
        else {
            $this->vue->connexion();
        }
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
                else if($verifPassword == true && isset($_SESSION['id'])) {
                    echo '<section class="erreur">';
                    echo '<p class="msg">Vous ??tes d??j?? connect?? sur le compte ayant pour id : </p>';
                    echo "$id.</br>";
                    echo '<a class="retourDeconnexionDC" href="index.php?module=ModPersonnel&action=deconnexion">Deconnexion</a>';
                    echo '</section>';
                }
                else {
                    $_SESSION['id'] = $id;
                    $this->vue->render("FichiersHTML/estConnecte.html");
                }
            }
        }
    }

    public function interfaceCompte() {
        if(!isset($_SESSION['id'])) {
            $this->vue->render("FichiersHTML/nestPasConnecte.html");
        }
        else {
            $this->vue->interfaceCompte();
        }
    }

    public function listeConventionStage() {
        if(!isset($_SESSION['id'])) {
            $this->vue->render("FichiersHTML/nestPasConnecte.html");
        }
        else {
            $this->tab = $this->modele->listeConventionStage();
            $this->vue->listeConventionStage($this->tab);
        }
    }

    public function deconnexion() {
        unset($_SESSION['id']);
        $this->vue->deconnexion();
    }

}