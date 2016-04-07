<?php

class Figure
{
    protected $_figureType;
    protected $_figureParams;

    public function __construct($type, $params = [])
    {
        $this->_figureType = $type;
        $this->setParams($params);
    }

    protected function setParams($params)
    {
        $this->_figureParams = $params;
        return $this;
    }

    public function getParams()
    {
        return $this->_figureParams;
    }

    public function getType()
    {
        return $this->_figureType;
    }

    public function drawImage()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $type = $this->getType();
        $params = $this->getParams();
        $canvas = imagecreate(FigureRules::IMG_WIDTH, FigureRules::IMG_HEIGHT);
        $backgroundColor = imagecolorallocate(
            $canvas,
            $params[FigureRules::BACKGROUND_COLOR_R],
            $params[FigureRules::BACKGROUND_COLOR_G],
            $params[FigureRules::BACKGROUND_COLOR_B]
        );
        $lineColor = imagecolorallocate(
            $canvas,
            $params[FigureRules::LINE_COLOR_R],
            $params[FigureRules::LINE_COLOR_G],
            $params[FigureRules::LINE_COLOR_B]
        );
        switch ($type) {
            case FigureRules::SQUARE_TYPE:
                imagerectangle(
                    $canvas,
                    FigureRules::FIGURE_STEP,
                    FigureRules::FIGURE_STEP,
                    FigureRules::FIGURE_STEP + $params[FigureRules::FIGURE_SIZE],
                    FigureRules::FIGURE_STEP + $params[FigureRules::FIGURE_SIZE],
                    $lineColor
                );
                break;
            case FigureRules::CIRCLE_TYPE:
                imageellipse(
                    $canvas,
                    FigureRules::IMG_WIDTH / 2,
                    FigureRules::IMG_HEIGHT / 2,
                    $params[FigureRules::FIGURE_SIZE],
                    $params[FigureRules::FIGURE_SIZE],
                    $lineColor
                );
                break;
        }
        header('Content-type: image/jpeg');
        imagejpeg($canvas);
        imagedestroy($canvas);
    }

}