<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.residuo_tratamientos".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $creado_por
 * @property string|null $actualizado_por
 * @property string|null $eliminado_por
 * @property bool $estado
 */
class ResiduoTratamientosModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.residuo_tratamientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'creado_por'], 'required'],
            [['descripcion', 'creado_por', 'actualizado_por', 'eliminado_por'], 'string'],
            [['estado'], 'boolean'],
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
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
