<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class ResiduoclasesController extends ActiveController
{
    public $modelClass = 'app\modules\v1\models\ResiduoClasesModel';

    public function actions()
    {
        $actions = parent::actions();

        $actions['create']['class'] = 'app\modules\v1\controllers\residuoclases\CreateAction';
        $actions['update']['class'] = 'app\modules\v1\controllers\residuoclases\UpdateAction';

        return $actions;
    }
}
