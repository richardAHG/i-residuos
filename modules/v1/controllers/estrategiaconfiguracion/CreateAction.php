<?php

namespace app\modules\v1\controllers\estrategiaconfiguracion;

use app\modules\v1\constants\Params;
use app\modules\v1\models\AtributosRelacionadosModel;
use app\modules\v1\models\EstrategiaAtributosTempModel;
use app\modules\v1\models\EstrategiaConfiguracionModel;
use app\modules\v1\models\query\CompromisoAsociadoQuery;
use app\modules\v1\models\ResiduoCompromisosModel;
use app\modules\v1\models\ResiduoUsuarioEstrategiasTempModel;
use app\modules\v1\models\ValoresAtributosRelacionadosModel;
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

            //obtener datos de residuo usuario estratgias configuracion temp
            $estrategiaTemp = ResiduoUsuarioEstrategiasTempModel::find()
                ->where(['estado' => true, 'usuario_id' => Params::getUserId()])
                ->orderBy('estrategia_id asc')
                ->all();


            foreach ($estrategiaTemp as $key => $value) {
                $estrategia = new EstrategiaConfiguracionModel();
                $estrategia->usuario_id = $value['usuario_id'];
                $estrategia->estrategia_id = $value['estrategia_id'];
                //TODO: columna creado_por

                if (!$estrategia->save()) {
                    throw new BadRequestHttpException("Error al registrar al estrategia configuración");
                }

                // traer datos de extrategia atributos temp
                $estrategiaAtributoTemp = EstrategiaAtributosTempModel::find()
                    ->where(['estado' => true, 'estrategia_id' => $value['estrategia_id']])
                    ->all();

                foreach ($estrategiaAtributoTemp as $key => $value) {

                    $estrategiaAtributo = new AtributosRelacionadosModel();
                    $estrategiaAtributo->estrategia_configuracion_id = $estrategia->id;
                    $estrategiaAtributo->variable_id = $value['variable_id'];
                    $estrategiaAtributo->atributo_id = $value['atributo_id'];
                    //TODO: columna creado_por

                    if (!$estrategiaAtributo->save()) {
                        throw new BadRequestHttpException("Error al guardar la estrategia atributo");
                    }
                }

                //obtener los compromisos de las estrategias selecionadas
                $compromisosAsociados = CompromisoAsociadoQuery::listarByEstrategy($estrategia->id);

                $arrayComrpomisos = array_column($compromisosAsociados, 'compromiso_id');
                $info = [];
                foreach ($arrayComrpomisos as $key => $value) {
                    $info[$value] = $value;
                }

                $arrayAtributo = AtributosRelacionadosModel::find()
                    ->select(['id', 'atributo_id'])
                    ->all();

                $arrayIndex = array_column($arrayAtributo, 'atributo_id');
                //regitro de compromisos que dependen de al estrategia seleccionada

                foreach ($info as $key => $value) {
                    $residuoCompromiso = new ResiduoCompromisosModel();
                    $residuoCompromiso->compromiso_id = $value;
                    $residuoCompromiso->estrategia_configuracion_id = $estrategia->id;

                    if (!$residuoCompromiso->save()) {
                        throw new BadRequestHttpException("Error al guardar los compromisos relacionados atributo");
                    }

                    foreach ($compromisosAsociados as $key => $value) {

                        $index = array_search($arrayIndex, $value['atributo_id']);

                        $valoresAtributosRelacionados = new ValoresAtributosRelacionadosModel();
                        $valoresAtributosRelacionados->compromiso_relacionado_id = $residuoCompromiso->id;
                        $valoresAtributosRelacionados->valor = $value['opcion_id'];
                        $valoresAtributosRelacionados->atributo_relacionado_id = $arrayAtributo[$index]['id'];
                    }
                }
            }

            //TODO: borrar los registros de las tablas temporales

            $transaction->commit();
        } catch (\Throwable $th) {
            $transaction->rollBack();
        }

        return $model;

    }
}
