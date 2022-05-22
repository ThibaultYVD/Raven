<?php
class MesCommandes extends Controller
{
    private $articles; //Pour l'exemple

    public function index($id = null)
    {
        $this->render("index");
    }

    public function __construct()
    {
    }
}
