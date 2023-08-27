<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "validasi_kategori".
 *
 * @property integer $kategori_id
 * @property string $kategori_nama
 */
class ValidasiKategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'validasi_kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategori_id'], 'required'],
            [['kategori_id'], 'integer'],
            [['kategori_nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kategori_id' => 'Kategori ID',
            'kategori_nama' => 'Kategori Nama',
        ];
    }
}
