<?php

class Controller
{
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function model($model)
    {
        /** @noinspection PhpIncludeInspection */
        require_once('app/models/' . $model . '.php');
        return new $model();
    }

}
