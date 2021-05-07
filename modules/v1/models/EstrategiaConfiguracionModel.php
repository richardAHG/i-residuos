<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.estrategia_configuracion".
 *
 * @property int $id
 * @property int $estrategia_id
 * @property string $creado_por
 * @property string|null $eliminado_por
 * @property bool|null $estado
 * @property int $usuario_id
 */
class EstrategiaConfiguracionModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.estrategia_configuracion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estrategia_id', 'creado_por', 'usuario_id'], 'required'],
            [['estrategia_id', 'usuario_id'], 'default', 'value' => null],
            [['estrategia_id', 'usuario_id'], 'integer'],
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
            'estrategia_id' => 'Estrategia ID',
            'creado_por' => 'Creado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
            'usuario_id' => 'Usuario ID',
        ];
    }
}
