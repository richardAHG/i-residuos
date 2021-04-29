<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class ResiduopeligrosController extends ActiveController
{
    public $modelClass='app\modules\v1\models\ResiduoPeligrosModel';

    public function actions()
    {
        $actions=parent::actions();

        $actions['create']['class']='app\modules\v1\controllers\peligros\CreateAction';
        $actions['update']['class']='app\modules\v1\controllers\peligros\UpdateAction';

        return $actions;
    }
}
