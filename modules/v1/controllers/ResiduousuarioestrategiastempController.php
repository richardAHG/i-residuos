<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class ResiduousuarioestrategiastempController extends ActiveController
{
    public $modelClass='app\modules\v1\models\ResiduoUsuarioEstrategiasTempModel';

    public function actions()
    {
        $actions=parent::actions();

        $actions['create']['class']='app\modules\v1\controllers\estrategiaconfiguracion\temp\CreateAction';
        $actions['index']['class']='app\modules\v1\controllers\estrategiaconfiguracion\temp\IndexAction';
        // $actions['delete']['class']='app\modules\v1\controllers\residuo\DeleteAction';

        return $actions;
    }
}
