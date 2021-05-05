<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class EstrategiaatributostempController extends ActiveController
{
    public $modelClass='app\modules\v1\models\EstrategiaAtributosTempModel';

    public function actions()
    {
        $actions=parent::actions();

        $actions['create']['class']='app\modules\v1\controllers\atributosvariable\temp\CreateAction';
        // $actions['update']['class']='app\modules\v1\controllers\residuo\UpdateAction';
        // $actions['delete']['class']='app\modules\v1\controllers\residuo\DeleteAction';

        return $actions;
    }
}