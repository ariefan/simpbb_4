<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bri_briva".
 *
 * @property string $ID
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property string $NM_WP_SPPT
 * @property string $TGL_JATUH_TEMPO_SPPT
 * @property int $PBB_YG_HARUS_DIBAYAR_SPPT
 * @property int $DENDA_SPPT
 * @property int $JML_SPPT_YG_DIBAYAR
 * @property string $TGL_PEMBAYARAN_SPPT
 * @property int $STATUS_PEMBAYARAN_SPPT
 * @property string $TGL_CETAK_SPPT
 * @property int $EXIST_BANK
 * @property int $EXIST_DATABASE
 * @property string $NIP_REKAM_BYR_SPPT
 * @property string $NO_REKENING
 * @property string $TGL_REKAM
 * @property string $LAST_UPDATE_BANK
 * @property string $LAST_UPDATE_DATABASE
 */
class BriBriva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bri_briva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'required'],
            [['TGL_JATUH_TEMPO_SPPT', 'TGL_PEMBAYARAN_SPPT', 'TGL_CETAK_SPPT', 'TGL_REKAM', 'LAST_UPDATE_BANK', 'LAST_UPDATE_DATABASE'], 'safe'],
            [['PBB_YG_HARUS_DIBAYAR_SPPT', 'DENDA_SPPT', 'JML_SPPT_YG_DIBAYAR', 'STATUS_PEMBAYARAN_SPPT', 'EXIST_BANK', 'EXIST_DATABASE'], 'integer'],
            [['ID'], 'string', 'max' => 10],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_PAJAK_SPPT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NM_WP_SPPT'], 'string', 'max' => 30],
            [['NIP_REKAM_BYR_SPPT', 'NO_REKENING'], 'string', 'max' => 50],
            [['ID'], 'unique'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
            'KD_BLOK' => 'Kd Blok',
            'NO_URUT' => 'No Urut',
            'KD_JNS_OP' => 'Kd Jns Op',
            'THN_PAJAK_SPPT' => 'Thn Pajak Sppt',
            'NM_WP_SPPT' => 'Nm Wp Sppt',
            'TGL_JATUH_TEMPO_SPPT' => 'Tgl Jatuh Tempo Sppt',
            'PBB_YG_HARUS_DIBAYAR_SPPT' => 'Pbb Yg Harus Dibayar Sppt',
            'DENDA_SPPT' => 'Denda Sppt',
            'JML_SPPT_YG_DIBAYAR' => 'Jml Sppt Yg Dibayar',
            'TGL_PEMBAYARAN_SPPT' => 'Tgl Pembayaran Sppt',
            'STATUS_PEMBAYARAN_SPPT' => 'Status Pembayaran Sppt',
            'TGL_CETAK_SPPT' => 'Tgl Cetak Sppt',
            'EXIST_BANK' => 'Exist Bank',
            'EXIST_DATABASE' => 'Exist Database',
            'NIP_REKAM_BYR_SPPT' => 'Nip Rekam Byr Sppt',
            'NO_REKENING' => 'No Rekening',
            'TGL_REKAM' => 'Tgl Rekam',
            'LAST_UPDATE_BANK' => 'Last Update Bank',
            'LAST_UPDATE_DATABASE' => 'Last Update Database',
        ];
    }
}
