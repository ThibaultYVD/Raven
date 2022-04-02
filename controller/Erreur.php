<?php

class Erreur extends Controller {
    
    public function erreur404($id=null){
       
       // var_dump($this->vars);    
        $this->render("erreur404");
    }
    public function erreur403($id=null){
       
        // var_dump($this->vars);    
         $this->render("erreur403");
     }
     public function erreur500($id=null){
       
        // var_dump($this->vars);    
         $this->render("erreur500");
     }

    public function __construct(){
        
    }
}
?>