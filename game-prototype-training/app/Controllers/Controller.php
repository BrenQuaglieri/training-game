<?php

namespace MyApp\Controllers;

use MyApp\Views\View;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function includeTemplate($tplName)
    {

        $this->view->includeLayout($tplName);

    }
}
