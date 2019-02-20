<?php

require 'vendor/autoload.php';

use MyApp\Characters\Heroes;

$terra = new Heroes('Terra', 'Keyblade\' master', 40, 5, 5);
$ventus = new Heroes('Ventus', 'Keyblade\'s master', 5, 40, 5);
$aqua = new Heroes('Aqua', 'Keyblade\'s master', 5, 5, 40);

$terra->convertStats();
$ventus->convertStats();
$aqua->convertStats();
/*$terra->showStats();
$terra->characterProfile();
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
$aqua->heal($ventus);*/

$path = $_GET['path'] ?? '/';

$router = new MyApp\FrontController\Router();
$router->addRoute('/', 'MainController#home');
$router->addRoute('/battleboard', 'MainController#battleboard');
$router->addRoute('/terra', 'CharacterController#terraProfile');
$router->addRoute('/aqua', 'CharacterController#aquaProfile');
$router->addRoute('/ventus', 'CharacterController#ventusProfile');

/*echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>';*/


$matchedRoute = $router->match($path);


if ($matchedRoute === false) {
    $target = 'MainController#Error404';
} else {
    $target = $matchedRoute['target'];
}

$explodeRoute = explode('#', $target);
$controllerName = $explodeRoute[0];
$methodName = $explodeRoute[1];
/*echo '<br>';
print_r($explodeRoute);
echo '<br>';*/

$controllerName = 'MyApp\Controllers\\'.$controllerName;

//require_once $controllerName. '.php';
$controller = new $controllerName();
$controller->$methodName();


