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
       
        $actions['indexAtributo']=[
            'class'=>'app\modules\v1\controllers\atributosvariable\temp\IndexAtributoAction',
            'modelClass'=>$this->modelClass
        ];
        
        $actions['indexVariable']=[
            'class'=>'app\modules\v1\controllers\atributosvariable\temp\IndexVariableAction',
            'modelClass'=>'app\modules\v1\models\ParametrosModel'
        ];

        // $actions['update']['class']='app\modules\v1\controllers\residuo\UpdateAction';
        // $actions['delete']['class']='app\modules\v1\controllers\residuo\DeleteAction';

        return $actions;
    }
}