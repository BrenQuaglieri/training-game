<?php

namespace MyApp\Controllers;

class CharacterController extends Controller
{
    public function terraProfile()
    {
        $this->includeTemplate('character-terra');
    }
    public function ventusProfile()
    {
        $this->includeTemplate('character-ventus');
    }
    public function aquaProfile()
    {
        $this->includeTemplate('character-aqua');
    }
}
