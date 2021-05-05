<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.estrategia_atributos_temp".
 *
 * @property int $id
 * @property int $estrategia_id
 * @property int|null $atributo_id
 * @property int $variable_id
 * @property bool $omitido
 * @property bool $estado
 * @property string|null $eliminado_por
 */
class EstrategiaAtributosTempModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.estrategia_atributos_temp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estrategia_id', 'variable_id'], 'required'],
            [['estrategia_id', 'atributo_id', 'variable_id'], 'default', 'value' => null],
            [['estrategia_id', 'atributo_id', 'variable_id'], 'integer'],
            [['omitido', 'estado'], 'boolean'],
            [['eliminado_por'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estrategia_id' => 'Estrategia ID',
            'atributo_id' => 'Atributo ID',
            'variable_id' => 'Variable ID',
            'omitido' => 'Omitido',
            'estado' => 'Estado',
            'eliminado_por' => 'Eliminado Por',
        ];
    }
}
