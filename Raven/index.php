<?php
//Panier ou connexion
if(!isset($_SESSION)) session_start();

//Définition de constante pour le chemin des fichiers
define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME'])); //Affiche /20212022/monsite/mvc/
define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME'])); //Affiche D:/APPLICATIONS/WAMP/www/monsite/mvc/
require_once ROOT.'/core/Controller.php';
require_once ROOT.'/core/Model.php';



//Décomposition de l'url
if(isset($_GET['p'])&&$_GET['p']!=''){
    $param=explode('/', $_GET['p']);
    $controller=ucfirst($param[0]);
    $action=isset($param[1]) ? $param[1] : 'index';
    $id=isset($param[2]) ? $param[2] : null;
    //var_dump($controller);
    //var_dump($action);
    //var_dump($id);

}else{
    $controller='Accueil';
    $action="index";
    $id=null;
}

//On appelle notre controller
    if(file_exists(ROOT.'controller/'.$controller.'.php')){
        require ROOT.'controller/'.$controller.'.php';
        $controllerspec=new $controller();
        if(method_exists($controllerspec,$action)){
            $controllerspec->$action($id);
        }else{
            $controllerspec=null;
            erreur();
        }
    }else{
        
        erreur();
    }
    
    
    
    //On appelle l'action donnée en URL
    



function erreur(){
    try{

        require ROOT.'controller/Erreur.php';
        $controllerErreur=new Erreur();
        $action='erreur404';
        $controllerErreur->$action();
    }catch(Exception $e){
        echo "tet";
    }
   
}
