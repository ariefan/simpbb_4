<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank_persepsi".
 *
 * @property string $KD_KANWIL
 * @property string $KD_KPPBB
 * @property string $KD_BANK_TUNGGAL
 * @property string $KD_BANK_PERSEPSI
 * @property string $NM_BANK_PERSEPSI
 * @property string $AL_BANK_PERSEPSI
 * @property string $NO_REK_BANK_PERSEPSI
 */
class BankPersepsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_persepsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'NM_BANK_PERSEPSI', 'AL_BANK_PERSEPSI'], 'required'],
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI'], 'string', 'max' => 2],
            [['NM_BANK_PERSEPSI'], 'string', 'max' => 30],
            [['AL_BANK_PERSEPSI'], 'string', 'max' => 50],
            [['NO_REK_BANK_PERSEPSI'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_KANWIL' => 'Kd Kanwil',
            'KD_KPPBB' => 'Kd Kppbb',
            'KD_BANK_TUNGGAL' => 'Kd Bank Tunggal',
            'KD_BANK_PERSEPSI' => 'Kd Bank Persepsi',
            'NM_BANK_PERSEPSI' => 'Nm Bank Persepsi',
            'AL_BANK_PERSEPSI' => 'Al Bank Persepsi',
            'NO_REK_BANK_PERSEPSI' => 'No Rek Bank Persepsi',
        ];
    }
}
