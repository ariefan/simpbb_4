<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas_bumi".
 *
 * @property string $KELAS_BUMI
 * @property string $NILAI_MINIMUM
 * @property string $NILAI_MAKSIMUM
 * @property string $NJOP_BUMI
 */
class KelasBumi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas_bumi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KELAS_BUMI', 'NILAI_MINIMUM', 'NILAI_MAKSIMUM', 'NJOP_BUMI'], 'required'],
            [['NILAI_MINIMUM', 'NILAI_MAKSIMUM', 'NJOP_BUMI'], 'number'],
            [['KELAS_BUMI'], 'string', 'max' => 5],
            [['KELAS_BUMI'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KELAS_BUMI' => 'Kelas Bumi',
            'NILAI_MINIMUM' => 'Nilai Minimum',
            'NILAI_MAKSIMUM' => 'Nilai Maksimum',
            'NJOP_BUMI' => 'Njop Bumi',
        ];
    }
}
