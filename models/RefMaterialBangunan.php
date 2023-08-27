<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_material_bangunan".
 *
 * @property int $KODE_MATERIAL
 * @property string $KATEGORI
 * @property int $NOMOR
 * @property string $BAHAN
 * @property string $SATUAN
 */
class RefMaterialBangunan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_material_bangunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KATEGORI', 'NOMOR', 'BAHAN', 'SATUAN'], 'required'],
            [['NOMOR'], 'integer'],
            [['KATEGORI'], 'string', 'max' => 2],
            [['BAHAN'], 'string', 'max' => 300],
            [['SATUAN'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KODE_MATERIAL' => 'Kode Material',
            'KATEGORI' => 'Kategori',
            'NOMOR' => 'Nomor',
            'BAHAN' => 'Bahan',
            'SATUAN' => 'Satuan',
        ];
    }
}
