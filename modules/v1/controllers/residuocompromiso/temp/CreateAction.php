<?php

namespace app\modules\v1\controllers\residuocompromiso\temp;

use app\modules\v1\models\CompromisoVariablesTempModel;
use app\rest\Action;
use Yii;
use yii\base\Model;
use yii\web\ServerErrorHttpException;
use yii\web\BadRequestHttpException;


/**
 * @author Jhon Serna <jhon_s11@live.com>
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

        // print_r($requestParams);
        // die();
        // $requestParams['creado_por'] = Params::getAudit();

        print_r($requestParams);
        die();


        $transaction = Yii::$app->db->beginTransaction();

        //TODO: select con join para llenar tabla compromiso_variable_temp->compromiso_atributo_opcion

        //TODO: la creación de los registros de realizaría en funcion al join

        try {

            //TODO: pendiente agregar funcion para valdiar que no registre estrategia repetida
            //FIXME: SI se envia un array con otros datos asignados anteriormente, eliminar la estrategia anterior


            // foreach ($requestParams['compromiso_id'] as $key => $value) {
            //     foreach ($requestParams['compromiso_atributo_opcion'][$key] as $ind => $row) {
            //         $model = new CompromisoVariablesTempModel();
            //         $model->estrategia_id = $requestParams['estrategia_id'];
            //         $model->compromiso_id = $row;
    
            //         if (!$model->save()) {
            //             throw new BadRequestHttpException("Error al guardar los datos");
            //         }
            //     }
            // }

            $transaction->commit();
        } catch (\Throwable $th) {
            $transaction->rollBack();
        }

        return $model;
    }
}