<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.atributos_relacionados".
 *
 * @property int $id
 * @property int $estrategia_configuracion_id
 * @property int $variable_id
 * @property int|null $atributo_id
 * @property bool $asociado
 * @property string $creado_por
 * @property string|null $actualizado_por
 * @property string|null $eliminado_por
 * @property bool $estado
 */
class AtributosRelacionadosModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.atributos_relacionados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estrategia_configuracion_id', 'variable_id', 'asociado', 'creado_por'], 'required'],
            [['estrategia_configuracion_id', 'variable_id', 'atributo_id'], 'default', 'value' => null],
            [['estrategia_configuracion_id', 'variable_id', 'atributo_id'], 'integer'],
            [['asociado', 'estado'], 'boolean'],
            [['creado_por', 'actualizado_por', 'eliminado_por'], 'string'],
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
            'atributo_id' => 'Atributo ID',
            'asociado' => 'Asociado',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
