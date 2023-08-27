<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_material_bangunan".
 *
 * @property int $KODE_MATERIAL
 * @property int $TAHUN
 * @property int $HARGA
 */
class DatMaterialBangunan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_material_bangunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KODE_MATERIAL', 'TAHUN', 'HARGA'], 'required'],
            [['KODE_MATERIAL', 'TAHUN', 'HARGA'], 'integer'],
            [['KODE_MATERIAL', 'TAHUN'], 'unique', 'targetAttribute' => ['KODE_MATERIAL', 'TAHUN']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KODE_MATERIAL' => 'Kode Material',
            'TAHUN' => 'Tahun',
            'HARGA' => 'Harga',
        ];
    }
}
