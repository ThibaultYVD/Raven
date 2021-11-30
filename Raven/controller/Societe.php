<?php


class Societe extends Controller {
    
    public function index($id=null){
       
       // var_dump($this->vars);    
        $this->render("index");
    }

    public function __construct(){
        
    }
}
?>