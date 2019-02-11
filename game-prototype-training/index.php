<?php

require 'vendor/autoload.php';

use MyApp\Characters\Heroes;

$path = $_GET['path'] ?? '/';

echo $path . '<br>';

$router = new MyApp\FrontController\Router();
$router->addRoute('/', 'plateau');
$router->addRoute('/terra', 'terra');
$router->addRoute('/aqua', 'aqua');
$router->addRoute('/ventus', 'ventus');

print_R($router->getRoutes());













$terra = new Heroes('Terra', 'Keyblade\' master', 40, 2, 8);
$ventus = new Heroes('Ventus', 'Keyblade\'s master', 2, 45, 3);
$aqua = new Heroes('Aqua', 'Keyblade\'s master', 0, 15, 35);

$terra->convertStats();
$ventus->convertStats();
$aqua->convertStats();
$terra->showStats();
$ventus->showStats();
$aqua->showStats();
echo '<h2> Tour 1 </h3>';
$terra->hit($ventus);
$ventus->hit($terra);
$aqua->heal($ventus);
echo '<h2> Fin du Tour 1 </h2>';
$terra->hit($ventus);
$terra->hit($ventus);
$terra->hit($ventus);
$aqua->heal($ventus);
