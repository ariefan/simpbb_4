<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_kategori_bersyarat".
 *
 * @property string $KATEGORI
 * @property int $JML_SATUAN_MINIMUM
 * @property int $JML_SATUAN_MAKSIMUM
 * @property double $NILAI
 */
class RefKategoriBersyarat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kategori_bersyarat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KATEGORI', 'JML_SATUAN_MINIMUM', 'JML_SATUAN_MAKSIMUM', 'NILAI'], 'required'],
            [['JML_SATUAN_MINIMUM', 'JML_SATUAN_MAKSIMUM'], 'integer'],
            [['NILAI'], 'number'],
            [['KATEGORI'], 'string', 'max' => 100],
            [['KATEGORI', 'JML_SATUAN_MINIMUM', 'JML_SATUAN_MAKSIMUM'], 'unique', 'targetAttribute' => ['KATEGORI', 'JML_SATUAN_MINIMUM', 'JML_SATUAN_MAKSIMUM']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KATEGORI' => 'Kategori',
            'JML_SATUAN_MINIMUM' => 'Jml Satuan Minimum',
            'JML_SATUAN_MAKSIMUM' => 'Jml Satuan Maksimum',
            'NILAI' => 'Nilai',
        ];
    }
}
