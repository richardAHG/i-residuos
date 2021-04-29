<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.residuo_tipos".
 *
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property int|null $residuo_super_tipo_id
 * @property string $creado_por
 * @property string|null $actualizado_por
 * @property string|null $eliminado_por
 * @property bool $estado
 */
class ResiduoTiposModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.residuo_tipos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'creado_por'], 'required'],
            [['residuo_super_tipo_id'], 'default', 'value' => null],
            [['residuo_super_tipo_id'], 'integer'],
            [['creado_por', 'actualizado_por', 'eliminado_por'], 'string'],
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
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
