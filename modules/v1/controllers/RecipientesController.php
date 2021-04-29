<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class RecipientesController extends ActiveController
{
    public $modelClass = 'app\modules\v1\models\RecipientesModel';

    public function actions()
    {
        $actions=parent::actions();

        $actions['create']['class']='app\modules\v1\controllers\recipiente\CreateAction';
        $actions['update']['class']='app\modules\v1\controllers\recipiente\UpdateAction';

        return $actions;
    }
}