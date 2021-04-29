<?php

namespace app\modules\v1\controllers\residuoclases;

use app\modules\v1\constants\Params;
use app\rest\Action;
use Yii;
use yii\base\Model;
use yii\web\ServerErrorHttpException;
use yii\web\BadRequestHttpException;


/**
 * @author Richard Huamán <richard21hg92@gmail.com>
 */
class CreateAction extends Action
{
/**
     * @var string the scenario to be assigned to the new model before it is validated and saved.
     */
    public $scenario = Model::SCENARIO_DEFAULT;
    /**
     * @var string the name of the view action. This property is needed to create the URL when the model is successfully created.
     */
    public $viewAction = 'view';


    /**
     * Creates a new model.
     * @return \yii\db\ActiveRecordInterface the model newly created
     * @throws ServerErrorHttpException if there is any error when creating the model
     */
    public function run()
    {
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }

        /* @var $model \yii\db\ActiveRecord */
        $model = new $this->modelClass([
            'scenario' => $this->scenario,
        ]);

        $proyecto_ID = Yii::$app->getRequest()->get($this->customToken, false);
        
        if (!$proyecto_ID) {
            throw new BadRequestHttpException("Bad Request");
        }

        $requestParams = Yii::$app->getRequest()->getBodyParams();

        $requestParams['creado_por'] = Params::getAudit();

        $model->load($requestParams, '');
        if (!$model->save()) {
            throw new BadRequestHttpException('Error al registrar el area');
        }

        return $model;
    }
}
