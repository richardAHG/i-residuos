<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.estrategia_configuracion".
 *
 * @property int $id
 * @property int $estrategia_id
 * @property int $usuario_id
 * @property string $creado_por
 * @property string|null $eliminado_por
 * @property bool $estado
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
            [['estrategia_id', 'usuario_id', 'creado_por'], 'required'],
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
            'usuario_id' => 'Usuario ID',
            'creado_por' => 'Creado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
