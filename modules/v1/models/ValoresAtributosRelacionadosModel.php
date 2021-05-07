<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.valores_atributos_relacionados".
 *
 * @property int $id
 * @property int $residuo_compromiso_id
 * @property int $atributo_relacionado_id
 * @property int $valor
 * @property string $creado_por
 * @property string|null $actualizado_por
 * @property string|null $eliminado_por
 * @property bool|null $estado
 */
class ValoresAtributosRelacionadosModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.valores_atributos_relacionados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['residuo_compromiso_id', 'atributo_relacionado_id', 'valor', 'creado_por'], 'required'],
            [['residuo_compromiso_id', 'atributo_relacionado_id', 'valor'], 'default', 'value' => null],
            [['residuo_compromiso_id', 'atributo_relacionado_id', 'valor'], 'integer'],
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
            'residuo_compromiso_id' => 'Residuo Compromiso ID',
            'atributo_relacionado_id' => 'Atributo Relacionado ID',
            'valor' => 'Valor',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
