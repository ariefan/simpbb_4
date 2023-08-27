<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank_export".
 *
 * @property string $nop
 * @property string $tahun
 * @property string $nama
 * @property string $alamat
 * @property int $pajak
 * @property string $tgl_tempo
 * @property string $status 0 = belum bayar
 */
class BankExport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_export';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nop', 'tahun'], 'required'],
            [['pajak'], 'integer'],
            [['tgl_tempo'], 'safe'],
            [['nop'], 'string', 'max' => 18],
            [['tahun'], 'string', 'max' => 4],
            [['nama', 'alamat'], 'string', 'max' => 100],
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
            'alamat' => 'Alamat',
            'pajak' => 'Pajak',
            'tgl_tempo' => 'Tgl Tempo',
            'status' => 'Status',
        ];
    }
}
