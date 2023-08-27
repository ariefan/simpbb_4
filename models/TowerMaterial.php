<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tower_material".
 *
 * @property int $KD_MATERIAL
 * @property string $ITEM
 * @property int $HARGA
 * @property string $SATUAN
 */
class TowerMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tower_material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['HARGA'], 'integer'],
            [['ITEM', 'SATUAN'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_MATERIAL' => 'Kd Material',
            'ITEM' => 'Item',
            'HARGA' => 'Harga',
            'SATUAN' => 'Satuan',
        ];
    }
}
