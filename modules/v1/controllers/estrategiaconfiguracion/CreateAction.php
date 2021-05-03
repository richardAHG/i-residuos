<?php

namespace app\modules\v1\controllers\estrategiaconfiguracion;

use app\modules\v1\constants\Params;
use app\modules\v1\models\AtributosVariableModel;
use app\modules\v1\models\ResiduoCompromisosModel;
use app\modules\v1\models\VariableEquivalenciaModel;
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

        $requestParams['creado_por'] = Params::getAudit();

        // print_r($requestParams);
        // die();


        $transaction = Yii::$app->db->beginTransaction();

        try {
            foreach ($requestParams as $key => $value) {
                if ($key=='estrategia_id') {
                    foreach ($value as $key2 => $value2) {
                        print_r($value2.', ');
                    }
                }
                if ($key=='estrategia_atributo_id') {
                    foreach ($value as $key3 => $value3) {
                        foreach ($value3 as $key4 => $value5) {
                            print_r($value5.', ');
                        }
                    }
                }
                if ($key=='variable_id') {
                    foreach ($value as $key5 => $value6) {
                        foreach ($value6 as $key6 => $value7) {
                            print_r($value7.', ');
                        }
                    }
                }
                if ($key=='estrategia_atributo_opciones_id') {
                    foreach ($value as $key7 => $value8) {
                        foreach ($value8 as $key8 => $value9) {
                            foreach ($value9 as $key9 => $value10) {
                                print_r($value10.', ');
                            }
                        }
                    }
                }
                if ($key=='valor') {
                    foreach ($value as $key10 => $value11) {
                        foreach ($value11 as $key11 => $value12) {
                            foreach ($value12 as $key12 => $value13) {
                                print_r($value13.', ');
                            }
                        }
                    }
                }
                if ($key=='compromiso_id') {
                    foreach ($value as $key13 => $value14) {
                        foreach ($value14 as $key14 => $value15) {
                            print_r($value15.', ');
                        }
                    }
                }
                //print_r($value2);
                // die();
            }
            die();
            foreach ($requestParams as $requestParam) {
                print_r($requestParam);die();
            }
            $model->load($requestParams, '');
            if (!$model->save()) {
                throw new BadRequestHttpException('Error al registrar la estrategia de configuracion');
            }

            $atributosVariable = new AtributosVariableModel();
            $atributosVariable->estrategia_configuracion_id = $model->id;
            $atributosVariable->variable_id = $requestParams['variable_id'];
            $atributosVariable->estrategia_atributo_id = $requestParams['estrategia_atributo_id'];
            $atributosVariable->creado_por = $requestParams['creado_por'];
            if ($atributosVariable->save()) {
                throw new BadRequestHttpException('Error al registrar la relacion entre atributo y variable');
            }

            $variableEquivalencia = new VariableEquivalenciaModel();
            $variableEquivalencia->atributos_variable_id = $atributosVariable->id;
            $variableEquivalencia->estrategia_atributo_opciones_id = $requestParams['estrategia_atributo_opciones_id'];
            $variableEquivalencia->valor = $requestParams['valor'];
            $variableEquivalencia->creado_por = $requestParams['creado_por'];
            if ($variableEquivalencia->save()) {
                throw new BadRequestHttpException('Error al registrar la equivalencia de variables');
            }

            $residuoCompromiso = new ResiduoCompromisosModel();
            $residuoCompromiso->compromiso_id = $requestParams['compormiso_id'];
            $residuoCompromiso->creado_por = $requestParams['creado_por'];
            if ($residuoCompromiso->save()) {
                throw new BadRequestHttpException('Error al registrar un compromiso relacionado a residuos');
            }

            $transaction->commit();
        } catch (\Throwable $th) {
            $transaction->rollBack();
        }

        return $model;
    }
}
