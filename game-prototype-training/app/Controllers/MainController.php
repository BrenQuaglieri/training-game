<?php

namespace MyApp\Controllers;

class MainController extends Controller
{
    public function home()
    {
        $this->includeTemplate('home');
    }

    public function battleboard()
    {
        $this->includeTemplate('battleboard');
    }

    public function error404()
    {
        http_response_code(404);
        $this->includeTemplate('error404');
        exit;
    }
}
