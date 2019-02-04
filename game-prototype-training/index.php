<?php

require 'vendor/autoload.php';

use PrototypeGame\Heroes;

$guerrier = new Heroes('FénixOfRaj', 'Tank', 40, 2, 8);
$voleur = new Heroes('Datzeboykid', 'dps', 5, 45, 0);
$mage = new Heroes('Mouwfawck', 'dps', 20, 30, 0);
$soigneur = new Heroes('GreyStone', 'healer', 10, 0, 40);

$guerrier->convertStats();
$voleur->convertStats();
$mage->convertStats();
$soigneur->convertStats();
$guerrier->showStats();
$voleur->showStats();
$mage->showStats();
$soigneur->showStats();
echo '<h2> Tour 1 </h3>';
$guerrier->hit($voleur);
$voleur->howMuchPv();
$voleur->hit($guerrier);
$guerrier->howMuchPv();
$soigneur->heal($guerrier);
$guerrier->howMuchPv();
$mage->hit($soigneur);
$soigneur->howMuchPv();
echo '<h2> Fin du Tour 1 </h2>';