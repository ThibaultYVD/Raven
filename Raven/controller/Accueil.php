<?php
class Accueil extends Controller
{
    private $articles; //Pour l'exemple

    public function index($id = null)
    {
        $laTable = Model::load('categorie');
        $this->articles = $laTable->find($laTable->connexion());
        $laTable->deconnexion();
        $laTable = null;
        $variable['categorie'] = array("lescategories" => $this->articles);
        $this->set($variable);
        // var_dump($this->vars);    
        $this->render("index");
    }

    public function __construct()
    {
    }
}
