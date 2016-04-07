<?php

class View
{
    /**
     * @param string $templateView
     * @param null   $data
     */
    public function generate($templateView, $data = null)
    {
        /** @noinspection PhpIncludeInspection */
        require_once('app/views/' . $templateView . '.php');
    }
}