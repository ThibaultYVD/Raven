<?php
class Connexion extends Controller
{
    public function index($id = null)
    {
        $variable['connexion'] = array("titre" => "Page de connexion", "description" => "C'est la page de connexion du site");
        $this->set($variable);
        $this->render("index");
    }

    public function __construct()
    {

    }
}
