<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tempat_pembayaran".
 *
 * @property string $KD_KANWIL
 * @property string $KD_KPPBB
 * @property string $KD_BANK_TUNGGAL
 * @property string $KD_BANK_PERSEPSI
 * @property string $KD_TP
 * @property string $NM_TP
 * @property string $ALAMAT_TP
 * @property string $NO_REK_TP
 */
class TempatPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tempat_pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP'], 'required'],
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP'], 'string', 'max' => 2],
            [['NM_TP'], 'string', 'max' => 30],
            [['ALAMAT_TP'], 'string', 'max' => 50],
            [['NO_REK_TP'], 'string', 'max' => 15],
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP'], 'unique', 'targetAttribute' => ['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP']],
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
            'KD_TP' => 'Kd Tp',
            'NM_TP' => 'Nm Tp',
            'ALAMAT_TP' => 'Alamat Tp',
            'NO_REK_TP' => 'No Rek Tp',
        ];
    }
}
