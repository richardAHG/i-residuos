<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class ResiduotratamientosController extends ActiveController
{
    public $modelClass = 'app\modules\v1\models\ResiduoTratamientosModel';

    public function actions()
    {
        $actions = parent::actions();
        $actions['create']['class'] = 'app\modules\v1\controllers\tratamiento\CreateAction';
        $actions['update']['class'] = 'app\modules\v1\controllers\tratamiento\UpdateAction';
        return $actions;
    }
}