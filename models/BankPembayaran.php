<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank_pembayaran".
 *
 * @property string $nop
 * @property string $tahun
 * @property string $nama
 * @property int $pajak
 * @property int $denda
 * @property int $total_bayar
 * @property string $ref
 * @property string $status
 */
class BankPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nop', 'tahun'], 'required'],
            [['pajak', 'denda', 'total_bayar'], 'integer'],
            [['nop'], 'string', 'max' => 18],
            [['tahun'], 'string', 'max' => 4],
            [['nama'], 'string', 'max' => 100],
            [['ref'], 'string', 'max' => 16],
            [['status'], 'string', 'max' => 1],
            [['nop', 'tahun'], 'unique', 'targetAttribute' => ['nop', 'tahun']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nop' => 'Nop',
            'tahun' => 'Tahun',
            'nama' => 'Nama',
            'pajak' => 'Pajak',
            'denda' => 'Denda',
            'total_bayar' => 'Total Bayar',
            'ref' => 'Ref',
            'status' => 'Status',
        ];
    }
}
