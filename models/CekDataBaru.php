<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cek_data_baru".
 *
 * @property string $NOP
 * @property string $THN
 * @property string $NAMA
 * @property int $KETETAPAN
 * @property int $KETETAPAN SESUDAH
 * @property int $ADA
 */
class CekDataBaru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cek_data_baru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOP', 'THN'], 'required'],
            [['KETETAPAN', 'KETETAPAN SESUDAH', 'ADA'], 'integer'],
            [['NOP'], 'string', 'max' => 18],
            [['THN'], 'string', 'max' => 4],
            [['NAMA'], 'string', 'max' => 255],
            [['NOP', 'THN'], 'unique', 'targetAttribute' => ['NOP', 'THN']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NOP' => 'Nop',
            'THN' => 'Thn',
            'NAMA' => 'Nama',
            'KETETAPAN' => 'Ketetapan',
            'KETETAPAN SESUDAH' => 'Ketetapan Sesudah',
            'ADA' => 'Ada',
        ];
    }
}
