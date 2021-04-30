<?php

namespace app\modules\v1\controllers;

use app\rest\ActiveController;

class RellenosanitarioController extends ActiveController
{
    public $modelClass = 'app\modules\v1\models\RellenoSanitarioModel';

    public function actions()
    {
        $actions = parent::actions();

        $actions['create']['class'] = 'app\modules\v1\controllers\rellenosanitario\CreateAction';
        $actions['update']['class'] = 'app\modules\v1\controllers\rellenosanitario\UpdateAction';

        return $actions;
    }
}