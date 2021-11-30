<?php

class Connexion extends Controller
{

    public function index($id = null)
    {
        if (isset($_SESSION['utilisateur'])) {
            //Vérifier si l'utilisateur est connecté
            $this->profil();
        } else if (isset($_POST['connexion_pseudo'])) {
            //var_dump($_POST['connexion_pseudo']);
            //Faire la table utilisateur
            $pseudo = $_POST['connexion_pseudo'];
            $mdp = md5($_POST['connexion_mdp']);
            $laTable = Model::load('utilisateur');
            $array = array("condition" => "pseudo='" . $pseudo . "' and mdp='" . $mdp . "'");
            $utilisateur = $laTable->find($laTable->connexion(), $array);
            if (count($utilisateur) == 1) {
                $_SESSION['utilisateur']['pseudo'] = $utilisateur[0]->pseudo;
                $_SESSION['utilisateur']['email'] = $utilisateur[0]->email;
                $_SESSION['utilisateur']['mdp'] = $utilisateur[0]->mdp;
                $this->profil();
            } else {

                //Le login est mauvais
                $variable['connexion'] = array("titre" => "Se connecter", "autre" => "<br>Login ou mot de passe erronné.");
                $this->set($variable);
                $this->render("index");
            }
        } else {
            //Le login est mauvais
            $variable['connexion'] = array("titre" => "Se connecter", "autre" => "Pas encore avec nous ? <a href='" . WEBROOT . "connexion/inscription' style='color:grey'>S'incrire</a>");
            $this->set($variable);
            $this->render("index");
        }
    }
    public function deconnexion($id = null)
    {
        unset($_SESSION['utilisateur']);
        /*$variable['connexion']=array("titre"=>"Se connecter","autre"=>"<a href='".WEBROOT."connexion/inscription' >s'incrire</a>");
             $this->set($variable);
             $this->render("index");*/
        $this->index();
    }
    public function inscription($id = null)
    {
        if (isset($_POST['inscription_name'])) {
            $pseudo = $_POST['inscription_pseudo'];
            $email = $_POST['inscription_email'];
            $mdp = md5($_POST['inscription_mdp']);
            //var_dump($_POST['inscription_name']);
            $laTable = Model::load('utilisateur');
            $array = array(
                "pseudo" => "'" . $pseudo . "'",
                "email" => "'" . $email . "'",
                "mdp" => "'" . $mdp . "'"
            );
            $resultat = false;
            if ($laTable->insert($laTable->connexion(), $array)) {
                $resultat = true;
                $_SESSION['utilisateur']['pseudo'] = $pseudo;
                $_SESSION['utilisateur']['email'] = $email;
                $_SESSION['utilisateur']['mdp'] = $mdp;
            }
            //var_dump($resultat);
            $laTable->deconnexion();
            $laTable = null;
            if ($resultat) {
                $this->profil();
            } else {
                $variable['connexion'] = array("titre" => "S'inscrire", "autre" => "Le pseudo est déjà pris!");
                $this->set($variable);
                $this->render("inscription");
            }
        } else {
            $variable['connexion'] = array("titre" => "S'inscrire");
            $this->set($variable);
            $this->render("inscription");
            // var_dump($this->vars);    

        }
    }
    public function modification($id = null)
    {
        //var_dump($_POST);
        if (isset($_POST['modification_name'])) {
            $pseudo = $_POST['modification_pseudo'];
            $email = $_POST['modification_email'];
            $laTable = Model::load('utilisateur');
            $array = array("champs" => "id", "condition" => "pseudo='" . $pseudo . "'");
            $utilisateur = $laTable->find($laTable->connexion(), $array);
            $laTable->id = $utilisateur[0]->id;
            //var_dump($utilisateur[0]);
            $array = array(
                "pseudo" => "'" . $pseudo . "'",
                "email" => "'" . $email . "'"
            );
            $resultat = false;
            //Chercher la clé
            if ($laTable->update($laTable->connexion(), $array)) {
                $resultat = true;
                $_SESSION['utilisateur']['pseudo'] = $pseudo;
                $_SESSION['utilisateur']['email'] = $email;
            }
            //var_dump($resultat);
            $laTable->deconnexion();
            $laTable = null;
            if ($resultat) {
                $this->profil();
            } else {
                $variable['connexion'] = $variable['connexion'] = array("titre_profil" => "Mon profil", "titre_commande" => "Mes commandes", "autre" => "La modification a échouée!");
                $this->set($variable);
                $this->render("profil");
            }
        } else {
            $this->profil();
        }
    }

    public function profil($id = null)
    {
        if (isset($_SESSION['utilisateur'])) {
            $variable['connexion'] = array("titre_profil" => "Mon profil", "titre_commande" => "Mes commandes");
            $this->set($variable);
            $this->render("profil");
        } else {
            $variable['connexion'] = array("titre" => "Se connecter");
            $this->set($variable);
            $this->render("index");
        }
    }
    public function commandes($i = null)
    {
        $variables['mescommandes'] = array("titre" => "Mes commandes");

        $this->set($variables);
        $this->render('commandes');
    }

    public function __construct()
    {
    }
}
