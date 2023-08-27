<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_kategori_material_bangunan".
 *
 * @property string $KATEGORI
 * @property double $BOBOT
 */
class RefKategoriMaterialBangunan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kategori_material_bangunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KATEGORI', 'BOBOT'], 'required'],
            [['BOBOT'], 'number'],
            [['KATEGORI'], 'string', 'max' => 2],
            [['KATEGORI'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KATEGORI' => 'Kategori',
            'BOBOT' => 'Bobot',
        ];
    }
}
