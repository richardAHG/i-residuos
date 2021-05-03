<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.atributos_variable".
 *
 * @property int $id
 * @property int $estrategia_configuracion_id
 * @property int $variable_id
 * @property int $estrategia_atributo_id
 * @property string $creado_por
 * @property string|null $actualizado_por
 * @property string|null $eliminado_por
 * @property bool|null $estado
 */
class AtributosVariableModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.atributos_variable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estrategia_configuracion_id', 'variable_id', 'estrategia_atributo_id', 'creado_por'], 'required'],
            [['estrategia_configuracion_id', 'variable_id', 'estrategia_atributo_id'], 'default', 'value' => null],
            [['estrategia_configuracion_id', 'variable_id', 'estrategia_atributo_id'], 'integer'],
            [['creado_por', 'actualizado_por', 'eliminado_por'], 'string'],
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
            'variable_id' => 'Variable ID',
            'estrategia_atributo_id' => 'Estrategia Atributo ID',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
