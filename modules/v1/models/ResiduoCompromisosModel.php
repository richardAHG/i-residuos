<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.residuo_compromisos".
 *
 * @property int $id
 * @property int $compromiso_id
 * @property string $creado_por
 * @property bool $estado
 * @property int $estrategia_configuracion_id
 */
class ResiduoCompromisosModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.residuo_compromisos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['compromiso_id', 'creado_por', 'estrategia_configuracion_id'], 'required'],
            [['compromiso_id', 'estrategia_configuracion_id'], 'default', 'value' => null],
            [['compromiso_id', 'estrategia_configuracion_id'], 'integer'],
            [['creado_por'], 'string'],
            [['estado'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'compromiso_id' => 'Compromiso ID',
            'creado_por' => 'Creado Por',
            'estado' => 'Estado',
            'estrategia_configuracion_id' => 'Estrategia Configuracion ID',
        ];
    }
}
