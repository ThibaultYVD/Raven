<?php
class Error404 extends Controller
{
    public function index($id = null)
    {
        $variable['error404'] = array("titre" => "404", "description" => "404 Page");
        $this->set($variable);
        $this->render("index");
    }

    public function __construct()
    {

    }
}
