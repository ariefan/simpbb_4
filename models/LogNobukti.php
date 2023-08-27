<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_nobukti".
 *
 * @property int $no_bukti
 * @property string $tanggal_bayar
 * @property string $tanggal_rekam
 * @property string $nop
 * @property int $tahun_pajak
 */
class LogNobukti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_nobukti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_bukti'], 'required'],
            [['no_bukti', 'tahun_pajak'], 'integer'],
            [['tanggal_bayar', 'tanggal_rekam'], 'safe'],
            [['nop'], 'string', 'max' => 18],
            [['no_bukti'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_bukti' => 'No Bukti',
            'tanggal_bayar' => 'Tanggal Bayar',
            'tanggal_rekam' => 'Tanggal Rekam',
            'nop' => 'Nop',
            'tahun_pajak' => 'Tahun Pajak',
        ];
    }
}
