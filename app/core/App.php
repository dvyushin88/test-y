<?php

class App
{
    protected $_controller = 'DrawController';
    protected $_action = 'index';

    public function __construct()
    {
        $routes = $this->getRoutes();
        if (file_exists('app/controllers/' . $routes[0] . 'Controller.php')) {
            $this->_controller = $routes[0] . 'Controller';
        }
        /** @noinspection PhpIncludeInspection */
        require_once('app/controllers/' . $this->_controller . '.php');
        $controller = new $this->_controller;
        if (isset($routes[1])) {
            if (method_exists($controller, $routes[1])) {
                $this->_action = $routes[1];
            }
        }
        $actionName = $this->_action;
        $controller->$actionName();
    }

    public function getRoutes()
    {
        return explode('/', $_SERVER['REQUEST_URI']);
    }


}