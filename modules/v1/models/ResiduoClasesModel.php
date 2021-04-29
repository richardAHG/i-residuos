<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.residuo_clases".
 *
 * @property int $id
 * @property string $nombre
 * @property string $creado_por
 * @property string|null $actualizado_por
 * @property string|null $eliminado_por
 * @property bool $estado
 */
class ResiduoClasesModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.residuo_clases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'creado_por'], 'required'],
            [['creado_por', 'actualizado_por', 'eliminado_por'], 'string'],
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
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
