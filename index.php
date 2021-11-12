<?php
//var_dump($_GET['p']);
if (isset($_GET['p']) && $_GET['p'] != '') {
    $param = explode('/', $_GET['p']);
    $controller = ucfirst($param[0]);
    $action = isset($param[1]) ? $param[1] : 'index';
    $id = isset($param[2]) ? $param[2] : null;
    //var_dump($controller);
    //var_dump($action);
    //var_dump($id);
} else {
    $controller = 'Accueil';
    $action = 'index';
    $id = null;
}



// Constantes WEBROOT et ROOT pour mémoriser le chemin des fichiers

//Affiche monsite/mvc
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

//Affiche [chemin]/www/monsite/mvc
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require ROOT . 'core/Controller.php';
require ROOT . 'core/Model.php';

//On appelle notre controller (la page)
if (file_exists(ROOT . 'controller/' . $controller . '.php')) //On teste si le fichier existe
{
    //echo "le fichier existe";
    require ROOT . 'controller/' . $controller . '.php';
    $controllerspec = new $controller();

    if (method_exists($controllerspec, $action)) {
        $controllerspec->$action($id);
    } else {
        echo "erreur";
    }
} else {
    require ROOT.'view/error404/index.php';
}
?>

