<?php
//Panier ou connexion
if (!isset($_SESSION)) session_start();

define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
//var_dump(WEBROOT);
//var_dump(ROOT);
require ROOT . '/core/Controller.php';
require ROOT . '/core/Model.php';

//var_dump($_GET['p']);
if (isset($_GET['p'])) {
    $param = explode('/', $_GET['p']);
    $controller = file_exists(ROOT . 'controller/' . ucfirst($param[0]) . '.php') ? ucfirst($param[0]) : 'Accueil';
   //var_dump($controller);
    require ROOT . "/controller/$controller.php";
    $action = isset($param[1]) && method_exists($controller, $param[1]) ? $param[1] : 'index';
    //var_dump($action);
    $id = isset($param[2]) ? $param[2] : null;
    //var_dump($id);
    $controllerspec = new $controller();
    //var_dump($controllerspec);
    $controllerspec->$action($id);
    //var_dump($controllerspec->$action($id));
}
