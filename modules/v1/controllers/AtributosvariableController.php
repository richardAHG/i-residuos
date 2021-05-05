<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class AtributosvariableController extends ActiveController
{
    public $modelClass='app\modules\v1\models\AtributosVariableModel';

    public function actions()
    {
        $actions=parent::actions();

        // $actions['create']['class']='app\modules\v1\controllers\estrategiaconfiguracion\temp\CreateAction';
        // $actions['update']['class']='app\modules\v1\controllers\residuo\UpdateAction';
        // $actions['delete']['class']='app\modules\v1\controllers\residuo\DeleteAction';

        return $actions;
    }
}
