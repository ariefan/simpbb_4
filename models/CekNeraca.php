<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cek_neraca".
 *
 * @property string $NOP
 * @property string $tahun
 * @property int $ketetapan
 * @property int $ada
 */
class CekNeraca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cek_neraca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOP', 'tahun'], 'required'],
            [['ketetapan', 'ada'], 'integer'],
            [['NOP'], 'string', 'max' => 18],
            [['tahun'], 'string', 'max' => 4],
            [['NOP', 'tahun'], 'unique', 'targetAttribute' => ['NOP', 'tahun']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NOP' => 'Nop',
            'tahun' => 'Tahun',
            'ketetapan' => 'Ketetapan',
            'ada' => 'Ada',
        ];
    }
}
