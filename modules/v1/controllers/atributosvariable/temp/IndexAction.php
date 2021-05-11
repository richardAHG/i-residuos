<?php

namespace app\modules\v1\controllers\atributosvariable\temp;

use app\modules\v1\models\query\AtributosQuery;
use app\rest\Action;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * IndexAction implementa el punto final de la API para enumerar varios modelos
 * 
 * @author Richard Huaman <richard21hg92@gmail.com>
 */
class IndexAction extends Action
{
    /**
     * @return ActiveDataProvider
     */
    public function run()
    {
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }

        return $this->prepareDataProvider();
    }

    /**
     * Prepares the data provider that should return the requested collection of the models.
     * @return ActiveDataProvider
     */
    protected function prepareDataProvider()
    {
        $requestParams = Yii::$app->getRequest()->getBodyParams();
        if (empty($requestParams)) {
            $requestParams = Yii::$app->getRequest()->getQueryParams();
        }

        $estrategiaId = $requestParams['estrategia_id'];
        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;

        $datos = AtributosQuery::getAtributtes($estrategiaId);

        return $datos;
        // $query = $modelClass::find()
        //     ->andWhere([
        //         "estado" => 1
        //     ]);

        // return Yii::createObject([
        //     'class' => ActiveDataProvider::className(),
        //     'query' => $query,
        //     'pagination' => [
        //         'params' => $requestParams,
        //     ],
        //     'sort' => [
        //         'params' => $requestParams,
        //     ],
        // ]);
    }
}
