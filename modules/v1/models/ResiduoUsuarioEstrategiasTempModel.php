<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.residuo_usuario_estrategias_temp".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $estrategia_id
 * @property bool $estado
 * @property string|null $eliminado_por
 */
class ResiduoUsuarioEstrategiasTempModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.residuo_usuario_estrategias_temp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'estrategia_id'], 'required'],
            [['usuario_id', 'estrategia_id'], 'default', 'value' => null],
            [['usuario_id', 'estrategia_id'], 'integer'],
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
            'usuario_id' => 'Usuario ID',
            'estrategia_id' => 'Estrategia ID',
            'estado' => 'Estado',
            'eliminado_por' => 'Eliminado Por',
        ];
    }
}
