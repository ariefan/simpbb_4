<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bpk_pembayaran_rekap".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property string $TGL_JATUH_TEMPO_SPPT
 * @property int $PIUTANG
 * @property int $POKOK_TERBAYAR
 * @property int $DENDA_TERBAYAR
 * @property int $SISA_PIUTANG
 * @property string $TGL_PEMBAYARAN_SPPT
 */
class BpkPembayaranRekap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bpk_pembayaran_rekap';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'PIUTANG', 'POKOK_TERBAYAR', 'DENDA_TERBAYAR', 'SISA_PIUTANG'], 'required'],
            [['TGL_JATUH_TEMPO_SPPT', 'TGL_PEMBAYARAN_SPPT'], 'safe'],
            [['PIUTANG', 'POKOK_TERBAYAR', 'DENDA_TERBAYAR', 'SISA_PIUTANG'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_PAJAK_SPPT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
            'KD_BLOK' => 'Kd Blok',
            'NO_URUT' => 'No Urut',
            'KD_JNS_OP' => 'Kd Jns Op',
            'THN_PAJAK_SPPT' => 'Thn Pajak Sppt',
            'TGL_JATUH_TEMPO_SPPT' => 'Tgl Jatuh Tempo Sppt',
            'PIUTANG' => 'Piutang',
            'POKOK_TERBAYAR' => 'Pokok Terbayar',
            'DENDA_TERBAYAR' => 'Denda Terbayar',
            'SISA_PIUTANG' => 'Sisa Piutang',
            'TGL_PEMBAYARAN_SPPT' => 'Tgl Pembayaran Sppt',
        ];
    }
}
