<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spop_mobile".
 *
 * @property int $ID_PERMOHONAN
 * @property string $USER_ID
 * @property string $TANGGAL_INPUT
 * @property string $STATUS
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $SUBJEK_PAJAK_ID
 * @property string $NO_FORMULIR_SPOP
 * @property string $JNS_TRANSAKSI_OP
 * @property string $KD_PROPINSI_BERSAMA
 * @property string $KD_DATI2_BERSAMA
 * @property string $KD_KECAMATAN_BERSAMA
 * @property string $KD_KELURAHAN_BERSAMA
 * @property string $KD_BLOK_BERSAMA
 * @property string $NO_URUT_BERSAMA
 * @property string $KD_JNS_OP_BERSAMA
 * @property string $KD_PROPINSI_ASAL
 * @property string $KD_DATI2_ASAL
 * @property string $KD_KECAMATAN_ASAL
 * @property string $KD_KELURAHAN_ASAL
 * @property string $KD_BLOK_ASAL
 * @property string $NO_URUT_ASAL
 * @property string $KD_JNS_OP_ASAL
 * @property string $NO_SPPT_LAMA
 * @property string $JALAN_OP
 * @property string $BLOK_KAV_NO_OP
 * @property string $KELURAHAN_OP
 * @property string $RW_OP
 * @property string $RT_OP
 * @property string $KD_STATUS_WP
 * @property int $LUAS_BUMI
 * @property string $KD_ZNT
 * @property string $JNS_BUMI
 * @property int $NILAI_SISTEM_BUMI
 * @property string $TGL_PENDATAAN_OP
 * @property string $NM_PENDATAAN_OP
 * @property string $NIP_PENDATA
 * @property string $TGL_PEMERIKSAAN_OP
 * @property string $NM_PEMERIKSAAN_OP
 * @property string $NIP_PEMERIKSA_OP
 */
class SpopMobile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spop_mobile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TANGGAL_INPUT', 'TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'safe'],
            [['JNS_TRANSAKSI_OP', 'JALAN_OP', 'KD_STATUS_WP', 'LUAS_BUMI', 'JNS_BUMI', 'TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'required'],
            [['LUAS_BUMI', 'NILAI_SISTEM_BUMI'], 'integer'],
            [['USER_ID'], 'string', 'max' => 50],
            [['STATUS', 'JALAN_OP'], 'string', 'max' => 100],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_PROPINSI_BERSAMA', 'KD_DATI2_BERSAMA', 'KD_PROPINSI_ASAL', 'KD_DATI2_ASAL', 'RW_OP', 'KD_ZNT'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'KD_KECAMATAN_BERSAMA', 'KD_KELURAHAN_BERSAMA', 'KD_BLOK_BERSAMA', 'KD_KECAMATAN_ASAL', 'KD_KELURAHAN_ASAL', 'KD_BLOK_ASAL', 'RT_OP'], 'string', 'max' => 3],
            [['NO_URUT', 'NO_URUT_BERSAMA', 'NO_URUT_ASAL', 'NO_SPPT_LAMA'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'JNS_TRANSAKSI_OP', 'KD_JNS_OP_BERSAMA', 'KD_JNS_OP_ASAL', 'KD_STATUS_WP', 'JNS_BUMI'], 'string', 'max' => 1],
            [['SUBJEK_PAJAK_ID', 'KELURAHAN_OP', 'NM_PENDATAAN_OP', 'NM_PEMERIKSAAN_OP'], 'string', 'max' => 30],
            [['NO_FORMULIR_SPOP'], 'string', 'max' => 11],
            [['BLOK_KAV_NO_OP'], 'string', 'max' => 15],
            [['NIP_PENDATA', 'NIP_PEMERIKSA_OP'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_PERMOHONAN' => 'Id Permohonan',
            'USER_ID' => 'User ID',
            'TANGGAL_INPUT' => 'Tanggal Input',
            'STATUS' => 'Status',
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
            'KD_BLOK' => 'Kd Blok',
            'NO_URUT' => 'No Urut',
            'KD_JNS_OP' => 'Kd Jns Op',
            'SUBJEK_PAJAK_ID' => 'Subjek Pajak ID',
            'NO_FORMULIR_SPOP' => 'No Formulir Spop',
            'JNS_TRANSAKSI_OP' => 'Jns Transaksi Op',
            'KD_PROPINSI_BERSAMA' => 'Kd Propinsi Bersama',
            'KD_DATI2_BERSAMA' => 'Kd Dati2 Bersama',
            'KD_KECAMATAN_BERSAMA' => 'Kd Kecamatan Bersama',
            'KD_KELURAHAN_BERSAMA' => 'Kd Kelurahan Bersama',
            'KD_BLOK_BERSAMA' => 'Kd Blok Bersama',
            'NO_URUT_BERSAMA' => 'No Urut Bersama',
            'KD_JNS_OP_BERSAMA' => 'Kd Jns Op Bersama',
            'KD_PROPINSI_ASAL' => 'Kd Propinsi Asal',
            'KD_DATI2_ASAL' => 'Kd Dati2 Asal',
            'KD_KECAMATAN_ASAL' => 'Kd Kecamatan Asal',
            'KD_KELURAHAN_ASAL' => 'Kd Kelurahan Asal',
            'KD_BLOK_ASAL' => 'Kd Blok Asal',
            'NO_URUT_ASAL' => 'No Urut Asal',
            'KD_JNS_OP_ASAL' => 'Kd Jns Op Asal',
            'NO_SPPT_LAMA' => 'No Sppt Lama',
            'JALAN_OP' => 'Jalan Op',
            'BLOK_KAV_NO_OP' => 'Blok Kav No Op',
            'KELURAHAN_OP' => 'Kelurahan Op',
            'RW_OP' => 'Rw Op',
            'RT_OP' => 'Rt Op',
            'KD_STATUS_WP' => 'Kd Status Wp',
            'LUAS_BUMI' => 'Luas Bumi',
            'KD_ZNT' => 'Kd Znt',
            'JNS_BUMI' => 'Jns Bumi',
            'NILAI_SISTEM_BUMI' => 'Nilai Sistem Bumi',
            'TGL_PENDATAAN_OP' => 'Tgl Pendataan Op',
            'NM_PENDATAAN_OP' => 'Nm Pendataan Op',
            'NIP_PENDATA' => 'Nip Pendata',
            'TGL_PEMERIKSAAN_OP' => 'Tgl Pemeriksaan Op',
            'NM_PEMERIKSAAN_OP' => 'Nm Pemeriksaan Op',
            'NIP_PEMERIKSA_OP' => 'Nip Pemeriksa Op',
        ];
    }
}
