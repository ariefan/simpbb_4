<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "piutang_denbar_pk".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $NAMA
 * @property int $PIUTANG
 * @property string $TGL_JATUH_TEMPO_SPPT
 * @property int $THN_PAJAK_SPPT
 * @property int $POKOK_TERBAYAR
 * @property int $DENDA_TERBAYAR
 * @property int $JML_SPPT_YG_DIBAYAR
 * @property string $TGL_PEMBAYARAN_SPPT
 * @property int $SISA_PIUTANG
 */
class PiutangDenbarPk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'piutang_denbar_pk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PIUTANG', 'THN_PAJAK_SPPT', 'POKOK_TERBAYAR', 'DENDA_TERBAYAR', 'JML_SPPT_YG_DIBAYAR', 'SISA_PIUTANG'], 'integer'],
            [['TGL_JATUH_TEMPO_SPPT', 'TGL_PEMBAYARAN_SPPT'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NAMA'], 'string', 'max' => 100],
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
            'NAMA' => 'Nama',
            'PIUTANG' => 'Piutang',
            'TGL_JATUH_TEMPO_SPPT' => 'Tgl Jatuh Tempo Sppt',
            'THN_PAJAK_SPPT' => 'Thn Pajak Sppt',
            'POKOK_TERBAYAR' => 'Pokok Terbayar',
            'DENDA_TERBAYAR' => 'Denda Terbayar',
            'JML_SPPT_YG_DIBAYAR' => 'Jml Sppt Yg Dibayar',
            'TGL_PEMBAYARAN_SPPT' => 'Tgl Pembayaran Sppt',
            'SISA_PIUTANG' => 'Sisa Piutang',
        ];
    }
}
