<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.variable_equivalencia".
 *
 * @property int $id
 * @property int $atributos_variable_id
 * @property int $estrategia_atributo_opciones_id
 * @property int|null $valor
 * @property string $creado_por
 * @property string|null $actualizado_por
 * @property string|null $eliminado_por
 * @property bool|null $estado
 */
class VariableEquivalenciaModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.variable_equivalencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'atributos_variable_id', 'estrategia_atributo_opciones_id', 'creado_por'], 'required'],
            [['id', 'atributos_variable_id', 'estrategia_atributo_opciones_id', 'valor'], 'default', 'value' => null],
            [['id', 'atributos_variable_id', 'estrategia_atributo_opciones_id', 'valor'], 'integer'],
            [['creado_por', 'actualizado_por', 'eliminado_por'], 'string'],
            [['estado'], 'boolean'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'atributos_variable_id' => 'Atributos Variable ID',
            'estrategia_atributo_opciones_id' => 'Estrategia Atributo Opciones ID',
            'valor' => 'Valor',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
