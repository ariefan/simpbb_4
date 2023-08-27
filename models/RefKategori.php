<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_kategori".
 *
 * @property string $KATEGORI
 * @property string $KODE
 * @property string $NAMA
 * @property double $NILAI
 */
class RefKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KATEGORI', 'KODE', 'NAMA'], 'required'],
            [['NILAI'], 'number'],
            [['KATEGORI', 'NAMA'], 'string', 'max' => 100],
            [['KODE'], 'string', 'max' => 2],
            [['KATEGORI', 'KODE'], 'unique', 'targetAttribute' => ['KATEGORI', 'KODE']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KATEGORI' => 'Kategori',
            'KODE' => 'Kode',
            'NAMA' => 'Nama',
            'NILAI' => 'Nilai',
        ];
    }
}
