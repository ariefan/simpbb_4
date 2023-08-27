<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_bank_backup".
 *
 * @property string $instansi
 * @property string $id
 * @property string $nama
 * @property string $jum_tagihan
 * @property string $biaya_adm
 * @property string $tagihan_lain
 * @property string $ket_tagihan_lain
 * @property string $npwp
 * @property string $alamat_wp
 * @property string $letak_op
 * @property string $tahun
 * @property string $tgl_jatuh_tempo
 * @property string $luas_bumi
 * @property string $luas_bng
 * @property string $njop_bumi
 * @property string $njop_bng
 * @property string $njoptkp
 * @property string $denda
 * @property string $formula
 * @property string $terbilang
 * @property string $tgl_tx
 * @property string $sts_bayar
 * @property string $kd_cab
 * @property string $kd_user
 * @property string $sts_reversal
 * @property string $no_bukti
 */
class TempBankBackup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temp_bank_backup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instansi'], 'string', 'max' => 255],
            [['id', 'tgl_tx'], 'string', 'max' => 100],
            [['nama', 'jum_tagihan', 'biaya_adm', 'tagihan_lain', 'ket_tagihan_lain', 'npwp', 'luas_bumi', 'luas_bng', 'njop_bumi', 'njop_bng', 'njoptkp', 'denda', 'kd_user', 'no_bukti'], 'string', 'max' => 500],
            [['alamat_wp', 'letak_op'], 'string', 'max' => 1500],
            [['tahun'], 'string', 'max' => 5],
            [['tgl_jatuh_tempo'], 'string', 'max' => 20],
            [['formula'], 'string', 'max' => 1000],
            [['terbilang'], 'string', 'max' => 2000],
            [['sts_bayar', 'sts_reversal'], 'string', 'max' => 2],
            [['kd_cab'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'instansi' => 'Instansi',
            'id' => 'ID',
            'nama' => 'Nama',
            'jum_tagihan' => 'Jum Tagihan',
            'biaya_adm' => 'Biaya Adm',
            'tagihan_lain' => 'Tagihan Lain',
            'ket_tagihan_lain' => 'Ket Tagihan Lain',
            'npwp' => 'Npwp',
            'alamat_wp' => 'Alamat Wp',
            'letak_op' => 'Letak Op',
            'tahun' => 'Tahun',
            'tgl_jatuh_tempo' => 'Tgl Jatuh Tempo',
            'luas_bumi' => 'Luas Bumi',
            'luas_bng' => 'Luas Bng',
            'njop_bumi' => 'Njop Bumi',
            'njop_bng' => 'Njop Bng',
            'njoptkp' => 'Njoptkp',
            'denda' => 'Denda',
            'formula' => 'Formula',
            'terbilang' => 'Terbilang',
            'tgl_tx' => 'Tgl Tx',
            'sts_bayar' => 'Sts Bayar',
            'kd_cab' => 'Kd Cab',
            'kd_user' => 'Kd User',
            'sts_reversal' => 'Sts Reversal',
            'no_bukti' => 'No Bukti',
        ];
    }
}
