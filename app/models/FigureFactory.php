<?php

class FigureFactory
{
    /**
     * @param $type
     * @param array $params
     * @return Figure
     */
    public static function createFigure($type, $params = [])
    {
        /** @noinspection PhpIncludeInspection */
        require_once('app/models/Figure.php');
        return new Figure($type, $params);
    }

}