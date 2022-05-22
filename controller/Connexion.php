<?php

class Connexion extends Controller
{

    public function index($id = null)
    {
        if (isset($_SESSION['utilisateur'])) {
            //Vérifier si l'utilisateur est connecté
            $this->profil();
        } else if (isset($_POST['connexion_pseudo'])) {
            //Faire la table utilisateur
            $pseudo = $_POST['connexion_pseudo'];
            $mdp = md5($_POST['connexion_mdp']);
            $laTable = Model::load('utilisateurs');
            $array = array("condition" => "pseudo='" . $pseudo . "' and motdepasse='" . $mdp . "'");
            $utilisateur = $laTable->find($laTable->connexion(), $array);
            if (count($utilisateur) == 1) {
                try {
                    // On se connecte à MySQL
                    $bdd = new PDO('mysql:host=localhost;dbname=2022-raven', 'raven_', '123456');
                } catch (Exception $e) {
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : ' . $e->getMessage());
                }

                // Si tout va bien, on peut continuer
                // On récupère tout le contenu de la table utilisateurs
                $reponse = $bdd->query("SELECT * FROM utilisateurs");
                // On affiche chaque entrée une à une
                while ($donnees = $reponse->fetch()) {
                    $cp = $donnees['CP'];
                    $ville = $donnees['VILLE'];
                    $adresse = $donnees['ADRESSE'];
                }
                $reponse->closeCursor(); // Termine le traitement de la requête


                $_SESSION['utilisateur']['pseudo'] = $pseudo;
                $_SESSION['utilisateur']['mdp'] = $mdp;
                $_SESSION['utilisateur']['CP'] = $cp;
                $_SESSION['utilisateur']['ville'] = $ville;
                $_SESSION['utilisateur']['adresse'] = $adresse;


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
        if (isset($_POST['envoyer'])) {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $mdp = md5($_POST['motdepasse']);
            $adresse = $_POST['adresse'];
            $CP = $_POST['CP'];
            $ville = $_POST['ville'];

            $laTable = Model::load('utilisateurs');
            $array = array(
                "pseudo" => "'" . $pseudo . "'",
                "email" => "'" . $email . "'",
                "motdepasse" => "'" . $mdp . "'",
                "adresse" => "'" . $adresse . "'",
                "CP" => "'" . $CP . "'",
                "ville" => "'" . $ville . "'"
            );

            $resultat = false;
            if ($laTable->insert(Model::connexion(), $array)) {
                $resultat = true;
                $_SESSION['utilisateur']['pseudo'] = $pseudo;
                $_SESSION['utilisateur']['email'] = $email;
                $_SESSION['utilisateur']['mdp'] = $mdp;
                $_SESSION['utilisateur']['adresse'] = $adresse;
                $_SESSION['utilisateur']['CP'] = $CP;
                $_SESSION['utilisateur']['ville'] = $ville;
                $resultat = true;
            }

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


        }
    }
    public function modification($id = null)
    {

        if (isset($_POST['modification_name'])) {
            $pseudo = $_POST['modification_pseudo'];
            $email = $_POST['modification_email'];
            $adresse = $_POST['modification_adresse'];
            $cp = $_POST['modification_cp'];
            $ville = $_POST['modification_ville'];
            $laTable = Model::load('utilisateurs');
            $array = array("champs" => "id", "condition" => "pseudo='" . $pseudo . "'");
            $utilisateur = $laTable->find($laTable->connexion(), $array);
            $laTable->id = $utilisateur[0]->id;

            $array = array(
                "pseudo" => "'" . $pseudo . "'",
                "email" => "'" . $email . "'"
            );
            $resultat = false;
            //Chercher la clé
            if ($laTable->update($laTable->connexion(), $array)) {
                $resultat = true;
                $_SESSION['utilisateurs']['pseudo'] = $pseudo;
                $_SESSION['utilisateurs']['email'] = $email;
            }

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
            $variable['connexion'] = array("titre_profil" => "Mon profil");
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
