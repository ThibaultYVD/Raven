<?php
class ProposDeNous extends Controller
{
    public function index($id = null)
    {
        $variable['proposDeNous'] = array("titre" => "Page d'information'", "description" => "C'est la page d'information sur nous'");
        $this->set($variable);
        $this->render("index");
    }

    public function __construct()
    {

    }
}