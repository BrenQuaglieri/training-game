<?php

namespace MyApp\Characters;

use MyApp\Characters\Characters;

class Heroes extends Characters {

    private $name;
    private $role;
    private $str;
    private $dxt;
    private $int;

    public function __construct($name, $role, $str, $dxt, $int, ...$data)
    {
        parent::__construct(...$data);

        $this->name = $name;
        $this->role = $role;
        $this->str = $str;
        $this->dxt = $dxt;
        $this->int = $int;

    }
    public function convertStats() 
    {
        $this->pv = intval($this->pv + $this->str * 4);
        $this->pv = intval($this->pv + $this->int * 2);
        $this->dmg = intval($this->dmg + $this->str * 2);
        $this->dmg = intval($this->dmg + $this->dxt * 2.5);
        $this->dmg = intval($this->dmg + $this->int * 1.5);
        $this->dodge = intval($this->dodge + $this->dxt * 0.4);
        $this->heal = intval($this->heal + $this->int * 1.25);
    }
    public function showStats()
    {
        echo '<h4>' . $this->name . '</h4>';
        echo '<li> pv = ' . $this->pv . '</li>';
        echo '<li> damages = ' . $this->dmg . '</li>';
        echo '<li> dodge chances = ' . $this->dodge . '</li>';
        echo '<li> heal = ' . $this->heal . '</li>';
        echo '<li> Statut = ' . $this->status . '</li>';
    }
    public function howMuchPv()
    {
        echo '<br>' . $this->name . ' : ' . $this->pv . ' PVs restants';
    }
    public function hit($targetting)
    {
        $dodgeChance = rand(0, 100);
        if ($dodgeChance <= $targetting->dodge && $targetting->status == 'Vivant') 
        {
            echo '<p>' . $this->name . ' rate son coup et n\'inflige aucun dégat à ' . $targetting->name . ' !</p>';
        }
        else
        {
            if ($targetting->pv > 0) 
            {
                $targetting->pv = $targetting->pv - $this->dmg;
                echo '<p>'. $this->name .' tape et inflige ' . $this->dmg . ' dommages à ' . $targetting->name . ' !';
                if ($targetting->pv > 0) 
                {
                    $targetting->howMuchPV();
                }
                else 
                {
                    echo '<p>' . $targetting->name . ' : ' . '0 PVs restants';
                    $targetting->pv = 0;
                    $targetting->status = 'Mort';
                    echo '<p>'. $this->name . ' a tué ' . $targetting->name . ' !</p>';
                    return $targetting->status;
                }
            }
            else if ($targetting->status == 'Mort') 
            {
                echo '<p>' . $targetting->name . ' est déjà mort ! </p>';
            }
        }
    }
    public function heal($targetting) 
    {
        if ($targetting->status == 'Vivant') 
        {
            $targetting->pv = $targetting->pv + $this->heal;
            echo '<p>'. $this->name .' soigne ' . $targetting->name . ' de ' . $this->heal . ' points de vie !';
        }
        else if ($targetting->status == 'Mort') 
        {
            echo '<p>'. $targetting->name .' est mort et ne peut être soigné ! </p>';    
        }
    }
}

