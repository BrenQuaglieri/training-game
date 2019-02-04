<?php

namespace PrototypeGame;

use PrototypeGame\Characters;

class Heroes extends Characters {

private $name;
private $role;
private $str;
private $dxt;
private $int;

public function __construct($name, $role, $str, $dxt, $int, ...$data) {

    parent::__construct(...$data);

    $this->name = $name;
    $this->role = $role;
    $this->str = $str;
    $this->dxt = $dxt;
    $this->int = $int;

}
public function convertStats() {
    $this->pv = $this->pv + $this->str * 3;
    $this->pv = $this->pv + $this->int;
    $this->dmg = $this->dmg + $this->str;
    $this->dmg = $this->dmg + $this->dxt * 3;
    $this->dodge = $this->dodge + $this->dxt * 0.4;
    $this->heal = $this->heal + $this->int * 1.25;
    
}
public function showStats() {
    echo '<h4>' . $this->name . '</h4>';
    echo '<li> pv = ' . $this->pv . '</li>';
    echo '<li> damages = ' . $this->dmg . '</li>';
    echo '<li> dodge chances = ' . $this->dodge . '</li>';
    echo '<li> heal = ' . $this->heal . '</li>';
}
public function howMuchPv() {
    echo '<br>' . $this->name . ' : ' . $this->pv . ' PVs restants';
}
public function hit($target) {
    $target->pv = $target->pv - $this->dmg;
    echo '<p>'. $this->name .' tape et inflige ' . $this->dmg . ' dommages à ' . $target->name . ' !';
}
public function heal($target) {
    $target->pv = $target->pv + $this->heal;
    echo '<p>'. $this->name .' soigne ' . $target->name . ' de ' . $this->heal . ' points de vie !';
}
}

