<?php

class Contacter extends Controller {
    
    public function index($id=null){
       
       if(isset($_POST['contact_name'])){
           $resultat=false;
           $nom="'".$_POST['contact_name']."'";
           $email="'".$_POST['contact_email']."'";
           $message="'".$_POST['contact_message']."'";
           $laTable=Model::load('contact');
           $array=array('pseudo'=>$nom,'email'=>$email,'message'=>$message);
           $resultat=$laTable->insert($laTable->connexion(),$array);
           if($resultat){
               $variable['message']=array("titre"=>"Nous contacter","descriptionO"=>"Votre message a bien été envoyé");
               $this->set($variable);
           }else{
            $variable['message']=array("titre"=>"Nous contacter","descriptionN"=>"Votre message n'a pas été envoyé.");
            $this->set($variable);
           }

        $this->render("index");
       } else{
        $variable['message']=array("titre"=>"Nous contacter");
            $this->set($variable);
        $this->render("index");
       }
        
    }

    public function __construct(){
        
    }
}
?>