<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.residuo_compromisos".
 *
 * @property int $id
 * @property int $estrategia_configuracion_id
 * @property int $compromiso_id
 * @property string $creado_por
 * @property string|null $eliminado_por
 * @property bool $estado
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
            [['estrategia_configuracion_id', 'compromiso_id', 'creado_por'], 'required'],
            [['estrategia_configuracion_id', 'compromiso_id'], 'default', 'value' => null],
            [['estrategia_configuracion_id', 'compromiso_id'], 'integer'],
            [['creado_por', 'eliminado_por'], 'string'],
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
            'estrategia_configuracion_id' => 'Estrategia Configuracion ID',
            'compromiso_id' => 'Compromiso ID',
            'creado_por' => 'Creado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
