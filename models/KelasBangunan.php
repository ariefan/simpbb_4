<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas_bangunan".
 *
 * @property string $KELAS_BANGUNAN
 * @property string $NILAI_MINIMUM
 * @property string $NILAI_MAKSIMUM
 * @property string $NJOP_BANGUNAN
 */
class KelasBangunan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas_bangunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KELAS_BANGUNAN', 'NILAI_MINIMUM', 'NILAI_MAKSIMUM', 'NJOP_BANGUNAN'], 'required'],
            [['NILAI_MINIMUM', 'NILAI_MAKSIMUM', 'NJOP_BANGUNAN'], 'number'],
            [['KELAS_BANGUNAN'], 'string', 'max' => 5],
            [['KELAS_BANGUNAN'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KELAS_BANGUNAN' => 'Kelas Bangunan',
            'NILAI_MINIMUM' => 'Nilai Minimum',
            'NILAI_MAKSIMUM' => 'Nilai Maksimum',
            'NJOP_BANGUNAN' => 'Njop Bangunan',
        ];
    }
}
