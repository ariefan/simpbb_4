<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spop".
 *
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
 * @property string $NO_PERSIL
 */
class Spop extends \yii\db\ActiveRecord
{
    private $_NOP;
    public function getNOP()
    {
        if (isset($this->_NOP)) return $this->_NOP;
        $this->_NOP = $this->KD_PROPINSI . $this->KD_DATI2 . $this->KD_KECAMATAN . $this->KD_KELURAHAN . $this->KD_BLOK . $this->NO_URUT . $this->KD_JNS_OP;
        return $this->_NOP;
    }

    public function setNOP($value)
    {
        $this->_NOP = $value;
    }

    private $_NOP_BERSAMA;
    public function getNOP_BERSAMA()
    {
        if (isset($this->_NOP_BERSAMA)) return $this->_NOP_BERSAMA;
        $this->_NOP_BERSAMA = $this->KD_PROPINSI_BERSAMA . $this->KD_DATI2_BERSAMA . $this->KD_KECAMATAN_BERSAMA . $this->KD_KELURAHAN_BERSAMA . $this->KD_BLOK_BERSAMA . $this->NO_URUT_BERSAMA . $this->KD_JNS_OP_BERSAMA;
        return $this->_NOP_BERSAMA;
    }

    private $_NOP_ASAL;
    public function getNOP_ASAL()
    {
        if (isset($this->_NOP_ASAL)) return $this->_NOP_ASAL;
        $this->_NOP_ASAL = $this->KD_PROPINSI_ASAL . $this->KD_DATI2_ASAL . $this->KD_KECAMATAN_ASAL . $this->KD_KELURAHAN_ASAL . $this->KD_BLOK_ASAL . $this->NO_URUT_ASAL . $this->KD_JNS_OP_ASAL;
        return $this->_NOP_ASAL;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'SUBJEK_PAJAK_ID', 'JNS_TRANSAKSI_OP', 'JALAN_OP', 'KD_STATUS_WP', 'LUAS_BUMI', 'JNS_BUMI', 'TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'required'],
            [['LUAS_BUMI', 'NILAI_SISTEM_BUMI'], 'integer'],
            [['TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_PROPINSI_BERSAMA', 'KD_DATI2_BERSAMA', 'KD_PROPINSI_ASAL', 'KD_DATI2_ASAL', 'RW_OP', 'KD_ZNT'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'KD_KECAMATAN_BERSAMA', 'KD_KELURAHAN_BERSAMA', 'KD_BLOK_BERSAMA', 'KD_KECAMATAN_ASAL', 'KD_KELURAHAN_ASAL', 'KD_BLOK_ASAL', 'RT_OP'], 'string', 'max' => 3],
            [['NO_URUT', 'NO_URUT_BERSAMA', 'NO_URUT_ASAL', 'NO_SPPT_LAMA'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'JNS_TRANSAKSI_OP', 'KD_JNS_OP_BERSAMA', 'KD_JNS_OP_ASAL', 'KD_STATUS_WP', 'JNS_BUMI'], 'string', 'max' => 1],
            [['SUBJEK_PAJAK_ID', 'JALAN_OP', 'KELURAHAN_OP', 'NM_PENDATAAN_OP', 'NM_PEMERIKSAAN_OP'], 'string', 'max' => 30],
            [['NO_FORMULIR_SPOP'], 'string', 'max' => 11],
            [['BLOK_KAV_NO_OP'], 'string', 'max' => 15],
            [['NIP_PENDATA', 'NIP_PEMERIKSA_OP'], 'string', 'max' => 20],
            [['NO_PERSIL'], 'string', 'max' => 5],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP']],
            [['NOP'], 'string', 'max' => 18],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NOP' => 'NOP',
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
            'NO_PERSIL' => 'No Persil',
        ];
    }

    public function getDataByNOP($NOP)
    {
        return $this->find()
            ->where([
                'KD_PROPINSI' => $NOP[0],
                'KD_DATI2' => $NOP[1],
                'KD_KECAMATAN' => $NOP[2],
                'KD_KELURAHAN' => $NOP[3],
                'KD_BLOK' => $NOP[4],
                'NO_URUT' => $NOP[5],
                'KD_JNS_OP' => $NOP[6],
            ])
            ->asArray()
            ->all();
    }
}
