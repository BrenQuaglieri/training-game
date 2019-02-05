<?php

namespace PrototypeGame;

abstract class Characters {

    public $pv;
    public $dmg;
    public $dodge;
    public $heal;
    public $status;
    
    public function __construct($pv = 100, $dmg = 5, $dodge = 1, $heal = 0, $status='Vivant') {
        $this->pv = $pv;
        $this->dmg = $dmg;
        $this->dodge = $dodge;
        $this->heal = $heal;
        $this->status = $status;
    }

    public abstract function howMuchPv();

    public abstract function hit($target);

    public abstract function heal($target);

}
