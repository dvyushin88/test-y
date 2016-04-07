<?php

class FigureRules
{
    const CIRCLE_TYPE = 1;
    const SQUARE_TYPE = 2;

    const IMG_WIDTH = 300;
    const IMG_HEIGHT = 300;

    const LINE_COLOR_R = 101;
    const LINE_COLOR_G = 102;
    const LINE_COLOR_B = 103;
    const FIGURE_SIZE = 201;
    const BACKGROUND_COLOR_R = 301;
    const BACKGROUND_COLOR_G = 302;
    const BACKGROUND_COLOR_B = 303;

    const FIGURE_STEP = 30;

    const ERROR_BAD_DATA = 'Bad data!';
    const ERROR_BAD_TYPE = 'Bad figure type!';

    public static function getAllowedTypes()
    {
        return [
            self::CIRCLE_TYPE => 'circle',
            self::SQUARE_TYPE => 'square',
        ];
    }

    public static function getAllowedParams()
    {
        return [
            self::FIGURE_SIZE        => 'figure size (side of a square OR radius of the circle)',
            self::LINE_COLOR_R       => 'line color Red',
            self::LINE_COLOR_G       => 'line color Green',
            self::LINE_COLOR_B       => 'line color Blue',
            self::BACKGROUND_COLOR_R => 'background color Red',
            self::BACKGROUND_COLOR_G => 'background color Green',
            self::BACKGROUND_COLOR_B => 'background color Blue',
        ];
    }

    /**
     * @param $request
     * @throws Exception
     */
    public function checkRequest($request)
    {
        if (!isset($request['type']) || !array_key_exists($request['type'], self::getAllowedTypes())) {
            throw new Exception(self::ERROR_BAD_TYPE);
        }
        foreach ($request['params'] as $key => $value) {
            if (!is_numeric($value) || !array_key_exists($key, self::getAllowedParams())) {
                throw new Exception(self::ERROR_BAD_DATA);
            }
        }
    }

}