<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.compromiso_variables_temp".
 *
 * @property int $id
 * @property int $compromiso_id
 * @property int $estrategia_id
 * @property bool $estado
 * @property string|null $eliminado_por
 */
class CompromisoVariablesTempModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.compromiso_variables_temp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['compromiso_id', 'estrategia_id'], 'required'],
            [['compromiso_id', 'estrategia_id'], 'default', 'value' => null],
            [['compromiso_id', 'estrategia_id'], 'integer'],
            [['estado'], 'boolean'],
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
            'compromiso_id' => 'Compromiso ID',
            'estrategia_id' => 'Estrategia ID',
            'estado' => 'Estado',
            'eliminado_por' => 'Eliminado Por',
        ];
    }
}
