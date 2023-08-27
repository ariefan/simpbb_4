<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bphtb_pembayaran".
 *
 * @property string $NO_BOOKING
 * @property string $NO_BPHTB
 * @property string $NO_TRANSAKSI
 * @property string $NAMA_WP
 * @property string $NAMA_PENYETOR
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $KD_PPAT
 * @property string $NM_PPAT
 * @property string $TGL_BAYAR
 * @property int $JML_BAYAR
 * @property string $TGL_REKAM
 * @property string $NIP_REKAM
 * @property string $NO_BUKTI
 */
class BphtbPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bphtb_pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NO_BPHTB'], 'required'],
            [['KD_PPAT', 'JML_BAYAR'], 'integer'],
            [['TGL_BAYAR', 'TGL_REKAM'], 'safe'],
            [['NO_BOOKING', 'NO_BPHTB', 'NO_TRANSAKSI', 'NAMA_WP', 'NAMA_PENYETOR', 'NM_PPAT', 'NIP_REKAM', 'NO_BUKTI'], 'string', 'max' => 100],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT'], 'string', 'max' => 3],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NO_BPHTB'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NO_BOOKING' => 'No Booking',
            'NO_BPHTB' => 'No Bphtb',
            'NO_TRANSAKSI' => 'No Transaksi',
            'NAMA_WP' => 'Nama Wp',
            'NAMA_PENYETOR' => 'Nama Penyetor',
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
            'KD_BLOK' => 'Kd Blok',
            'NO_URUT' => 'No Urut',
            'KD_JNS_OP' => 'Kd Jns Op',
            'KD_PPAT' => 'Kd Ppat',
            'NM_PPAT' => 'Nm Ppat',
            'TGL_BAYAR' => 'Tgl Bayar',
            'JML_BAYAR' => 'Jml Bayar',
            'TGL_REKAM' => 'Tgl Rekam',
            'NIP_REKAM' => 'Nip Rekam',
            'NO_BUKTI' => 'No Bukti',
        ];
    }
}
