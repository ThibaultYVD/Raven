<?php
class Utilisateur extends Controller
{
    public function index($id = null)
    {
        $variable['utilisateur'] = array("titre" => "Page de connexion", "description" => "C'est la page de connexion du site");
        $this->set($variable);
        $this->render("index");
    }

    public function connexion($id = null)
    {
        $variable['utilisateur'] = array("titre" => "Page de connexion", "description" => "C'est la page de connexion du site");
        $this->set($variable);
        $this->render("connexion");
    }

    public function __construct()
    {

    }
}
