<?php

namespace MyApp\Controllers;

class MainController
{
    public function home()
    {
        echo 'Page d\'accueil';
    }

    public function error404()
    {
        http_response_code(404);
        echo 'Page non trouvée :/';
        exit;
    }
}
