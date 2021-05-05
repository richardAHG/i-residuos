<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class CompromisovariablestempController extends ActiveController
{
    public $modelClass='app\modules\v1\models\CompromisoVariablesTempModel';

    public function actions()
    {
        $actions=parent::actions();

        $actions['create']['class']='app\modules\v1\controllers\residuocompromiso\temp\CreateAction';
        // $actions['update']['class']='app\modules\v1\controllers\residuo\UpdateAction';
        // $actions['delete']['class']='app\modules\v1\controllers\residuo\DeleteAction';

        return $actions;
    }
}