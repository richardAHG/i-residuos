<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.residuo_compromisos".
 *
 * @property int $id
 * @property int $compromiso_id
 * @property string $creado_por
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
            [['compromiso_id', 'creado_por'], 'required'],
            [['compromiso_id'], 'default', 'value' => null],
            [['compromiso_id'], 'integer'],
            [['creado_por'], 'string'],
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
            'compromiso_id' => 'Compromiso ID',
            'creado_por' => 'Creado Por',
            'estado' => 'Estado',
        ];
    }
}
