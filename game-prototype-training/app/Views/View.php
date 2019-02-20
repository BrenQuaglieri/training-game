<?php

Namespace MyApp\Views;

class View
{
    public function includeTemplate(string $tplName)
    {
        include __DIR__.'/../templates/'.$tplName.'.php';
    }

    public function includeLayout(string $tplName)
    {
        $this->includeTemplate('layout/header');

        $this->includeTemplate($tplName);

        $this->includeTemplate('layout/footer');
    }
}
