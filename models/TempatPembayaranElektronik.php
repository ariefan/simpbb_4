<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tempat_pembayaran_elektronik".
 *
 * @property string $KD_KANWIL
 * @property string $KD_KPPBB
 * @property string $KD_BANK_TUNGGAL
 * @property string $KD_BANK_PERSEPSI
 * @property string $KD_TP
 * @property string $KD_TAMPIL
 * @property string $KD_URUT_TAMPIL
 * @property string $ATM
 * @property string $TELLER
 * @property string $INTERNET
 * @property string $PHONE
 * @property string $SMS
 */
class TempatPembayaranElektronik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tempat_pembayaran_elektronik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP', 'KD_TAMPIL'], 'required'],
            [['KD_URUT_TAMPIL'], 'number'],
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP'], 'string', 'max' => 2],
            [['KD_TAMPIL', 'ATM', 'TELLER', 'INTERNET', 'PHONE', 'SMS'], 'string', 'max' => 1],
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP', 'KD_TAMPIL'], 'unique', 'targetAttribute' => ['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP', 'KD_TAMPIL']],
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
            'KD_TAMPIL' => 'Kd Tampil',
            'KD_URUT_TAMPIL' => 'Kd Urut Tampil',
            'ATM' => 'Atm',
            'TELLER' => 'Teller',
            'INTERNET' => 'Internet',
            'PHONE' => 'Phone',
            'SMS' => 'Sms',
        ];
    }
}
