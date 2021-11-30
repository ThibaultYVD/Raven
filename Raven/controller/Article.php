<?php

class Article extends Controller{
    private $articles; //Pour l'exemple

    public function categorie($id=null){
        $laTable = Model::load('son');
        $array=array('condition'=>"cat=$id");
        $this->articles = $laTable->find($laTable->connexion());
        $laTable->deconnexion();
        $laTable=null;
        $variable['categorie']=array("titre"=>"Les articles du site", "description"=>"Le texte d'introduction des articles", "lesArticles"=>$this->articles);
        $this->set($variable);
        //var_dump($this->vars);    
        $this->render("categorie");
    }

    public function articlestries($id){
        $laTable = Model::load('son');
        $array=array('condition'=>"cat=$id", 'join'=> 'inner join categorie on son.cat=categorie.id', 'champs'=> ' son.id as id, categorie.image as image, son.titre as titre, description, lien, format');
        $this->articles = $laTable->find($laTable->connexion(),$array);
        $laTable->deconnexion();
        $laTable=null;
        $variable['articles']=array("titre"=>"Les articles du site", "description"=>"Le texte d'introduction des articles", "lesArticles"=>$this->articles);
        $this->set($variable);
        //var_dump($this->vars);    
        $this->render("index");
    }

    public function index($id=null){
        if($id==null){
            $laTable = Model::load('son');
            $array=array('join'=> 'inner join categorie on son.cat=categorie.id', 'champs'=> ' son.id as id, categorie.image as image, son.titre as titre, description, lien, format');
            $this->articles = $laTable->find($laTable->connexion(), $array);
            $laTable->deconnexion();
            $laTable=null;
            $variable['articles']=array("titre"=>"Les articles du site", "description"=>"Le texte d'introduction des articles", "lesArticles"=>$this->articles);
            $this->set($variable);
           // var_dump($this->vars);    
            $this->render("index");
        }else{
            $this->articlestries($id);
        }
        
    }

    public function detail($id){ 
        $laTable = Model::load('Son');
        $laTable->id=$id;
        $this->articles = $laTable->readOne($laTable->connexion());
        //var_dump($this->articles);
        $laTable->deconnexion();
        $laTable=null;
        $variable['article']=array("titre"=>"L'article du produit ".$this->articles->id, "identifiant"=>$this->articles->id);
        $this->set($variable);
        //var_dump($this->vars);    
        $this->render("detail");
    }

    public function inserer($id=null){
        $laTable = Model::load('Son');
        $array=array('titre'=>'\'test\'','description'=>'\'La description\'', 'lien'=>'\'le lien\'','format'=>'\'wav\'','prix'=>1);
        $this->articles = $laTable->insert($laTable->connexion(),$array);
        //var_dump($this->articles);
        $laTable->deconnexion();
        $laTable=null;
    }
    public function modifier($id){
        $laTable = Model::load('Son');
        $laTable->id=$id;
        $array=array('titre'=>'\'test\'','description'=>'\'La description\'', 'lien'=>'\'le lien\'','format'=>'\'wav\'','prix'=>5);
        $this->articles = $laTable->update($laTable->connexion(),$array);
        //var_dump($this->articles);
        $laTable->deconnexion();
        $laTable=null;
    }
    public function supprimer($id){
        $laTable = Model::load('Son');
        $laTable->id=$id;    
        $this->articles = $laTable->delete($laTable->connexion());
        //var_dump($this->articles);
        $laTable->deconnexion();
        $laTable=null;
    }

    public function trouver($id=null){
        $laTable = Model::load('Son');
        $laTable->id=$id;
        $array=array('champs'=>'titre, description','order'=>'prix', 'condition'=>'format="wav"');
        $this->articles = $laTable->find($laTable->connexion(),$array);
        //var_dump($this->articles);
        $laTable->deconnexion();
        $laTable=null;
    }
}
?>