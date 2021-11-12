<?php


class Article extends Controller
{
    private $articles;

    public function index($id = null)
    {
        $laTable = Model::load('son');
        $this->articles = $laTable->find($laTable->connexion());
        $laTable = null;
        $variable['articles'] = array(
            "titre" => "Les articles du site",
            "description" => "Le texte d'introduction des articles",
            "lesArticles" => $this->articles
        );
        $this->set($variable);
        //var_dump($this->vars);
        $this->render("index");
    }

    public function detail($id)
    {

        $laTable = Model::load('son');
        $laTable->id = $id;
        $this->articles = $laTable->readOne($laTable->connexion());
        $laTable->deconnexion();
        $laTable = null;
        $variable['article'] = array("titre" => "L'article du produit " .
            $this->articles[0]->id, "identifiant" => $this->articles[0]->id);
        $this->set($variable);
        //var_dump($this->articles);
        $this->render("detail");
    }
    
    public function __construct()
    {
        
    }
}
