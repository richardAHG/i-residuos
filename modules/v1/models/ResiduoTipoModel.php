<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.residuo_tipo".
 *
 * @property int $id
 * @property string|null $codigo
 * @property string|null $nombre
 * @property int|null $residuo_super_tipo_id
 * @property bool|null $estado
 */
class ResiduoTipoModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.residuo_tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['residuo_super_tipo_id'], 'default', 'value' => null],
            [['residuo_super_tipo_id'], 'integer'],
            [['estado'], 'boolean'],
            [['codigo'], 'string', 'max' => 20],
            [['nombre'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'residuo_super_tipo_id' => 'Residuo Super Tipo ID',
            'estado' => 'Estado',
        ];
    }
}
