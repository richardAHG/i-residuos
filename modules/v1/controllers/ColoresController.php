<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class ColoresController extends ActiveController
{
    public $modelClass = 'app\modules\v1\models\ResiduoColoresModel';
    
    public function actions()
    {
        $actions = parent::actions();

        $actions['create']['class'] = 'app\modules\v1\controllers\color\CreateAction';
        $actions['update']['class'] = 'app\modules\v1\controllers\color\UpdateAction';

        return $actions;
    }
}