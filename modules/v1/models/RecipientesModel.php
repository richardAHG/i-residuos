<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "residuos.recipientes".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $material
 * @property int $peso_maximo
 * @property int $volumen
 * @property string $creado_por
 * @property string|null $actualizado_por
 * @property string|null $eliminado_por
 * @property bool $estado
 */
class RecipientesModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos.recipientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'material', 'peso_maximo', 'volumen', 'creado_por'], 'required'],
            [['peso_maximo', 'volumen'], 'default', 'value' => null],
            [['peso_maximo', 'volumen'], 'integer'],
            [['creado_por', 'actualizado_por', 'eliminado_por'], 'string'],
            [['estado'], 'boolean'],
            [['nombre'], 'string', 'max' => 120],
            [['descripcion', 'material'], 'string', 'max' => 255],
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
            'material' => 'Material',
            'peso_maximo' => 'Peso Maximo',
            'volumen' => 'Volumen',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
            'eliminado_por' => 'Eliminado Por',
            'estado' => 'Estado',
        ];
    }
}
