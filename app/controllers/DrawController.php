<?php

class DrawController extends Controller
{
    public function index()
    {
        /** @var FigureRules $figureRules */
        $figureRules = $this->model('FigureRules');
        if (isset($_POST) && !empty($_POST))
        {
            $data = [];
            /** @var FigureFactory $figureFactory */
            $figureFactory = $this->model('FigureFactory');
            try {
                $figureRules->checkRequest($_POST);
                $figure = $figureFactory::createFigure($_POST['type'], $_POST['params']);
                $figure->drawImage();
            } catch (Exception $e) {
                $data['error'] = $e->getMessage();
            }
            $this->view->generate('draw', $data);
        }
        $this->view->generate('draw');
    }

}