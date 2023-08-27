<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_op_bangunan".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $NO_BNG
 * @property string $KD_JPB
 * @property string $NO_FORMULIR_LSPOP
 * @property string $THN_DIBANGUN_BNG
 * @property string $THN_RENOVASI_BNG
 * @property int $LUAS_BNG
 * @property int $JML_LANTAI_BNG
 * @property string $KONDISI_BNG
 * @property string $JNS_KONSTRUKSI_BNG
 * @property string $JNS_ATAP_BNG
 * @property string $KD_DINDING
 * @property string $KD_LANTAI
 * @property string $KD_LANGIT_LANGIT
 * @property int $NILAI_SISTEM_BNG
 * @property string $JNS_TRANSAKSI_BNG
 * @property string $TGL_PENDATAAN_BNG
 * @property string $NIP_PENDATA_BNG
 * @property string $TGL_PEMERIKSAAN_BNG
 * @property string $NIP_PEMERIKSA_BNG
 * @property string $TGL_PEREKAMAN_BNG
 * @property string $NIP_PEREKAM_BNG
 * @property string $TGL_KUNJUNGAN_KEMBALI
 * @property int $NILAI_INDIVIDU
 * @property int $AKTIF
 */
class DatOpBangunan extends \yii\db\ActiveRecord
{
    private $_NOP;
    public function getNOP()
    {       
       if(isset($this->_NOP)) return $this->_NOP;   
       $this->_NOP = $this->KD_PROPINSI.$this->KD_DATI2.$this->KD_KECAMATAN.$this->KD_KELURAHAN.$this->KD_BLOK.$this->NO_URUT.$this->KD_JNS_OP; 
       return $this->_NOP; 
    }
    
    public function setNOP($value)
    {
        $this->_NOP = $value;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_op_bangunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'required'],
            [['NO_BNG', 'LUAS_BNG', 'JML_LANTAI_BNG', 'NILAI_SISTEM_BNG', 'NILAI_INDIVIDU', 'AKTIF'], 'integer'],
            [['TGL_PENDATAAN_BNG', 'TGL_PEMERIKSAAN_BNG', 'TGL_PEREKAMAN_BNG', 'TGL_KUNJUNGAN_KEMBALI'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_JPB'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_DIBANGUN_BNG', 'THN_RENOVASI_BNG'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'KONDISI_BNG', 'JNS_KONSTRUKSI_BNG', 'JNS_ATAP_BNG', 'KD_DINDING', 'KD_LANTAI', 'KD_LANGIT_LANGIT', 'JNS_TRANSAKSI_BNG'], 'string', 'max' => 1],
            [['NO_FORMULIR_LSPOP'], 'string', 'max' => 11],
            [['NIP_PENDATA_BNG', 'NIP_PEMERIKSA_BNG', 'NIP_PEREKAM_BNG'], 'string', 'max' => 30],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG']],
            [['NOP'], 'string', 'max' => 18],        
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
            'NO_BNG' => 'No Bng',
            'KD_JPB' => 'Kd Jpb',
            'NO_FORMULIR_LSPOP' => 'No Formulir Lspop',
            'THN_DIBANGUN_BNG' => 'Thn Dibangun Bng',
            'THN_RENOVASI_BNG' => 'Thn Renovasi Bng',
            'LUAS_BNG' => 'Luas Bng',
            'JML_LANTAI_BNG' => 'Jml Lantai Bng',
            'KONDISI_BNG' => 'Kondisi Bng',
            'JNS_KONSTRUKSI_BNG' => 'Jns Konstruksi Bng',
            'JNS_ATAP_BNG' => 'Jns Atap Bng',
            'KD_DINDING' => 'Kd Dinding',
            'KD_LANTAI' => 'Kd Lantai',
            'KD_LANGIT_LANGIT' => 'Kd Langit Langit',
            'NILAI_SISTEM_BNG' => 'Nilai Sistem Bng',
            'JNS_TRANSAKSI_BNG' => 'Jns Transaksi Bng',
            'TGL_PENDATAAN_BNG' => 'Tgl Pendataan Bng',
            'NIP_PENDATA_BNG' => 'Nip Pendata Bng',
            'TGL_PEMERIKSAAN_BNG' => 'Tgl Pemeriksaan Bng',
            'NIP_PEMERIKSA_BNG' => 'Nip Pemeriksa Bng',
            'TGL_PEREKAMAN_BNG' => 'Tgl Perekaman Bng',
            'NIP_PEREKAM_BNG' => 'Nip Perekam Bng',
            'TGL_KUNJUNGAN_KEMBALI' => 'Tgl Kunjungan Kembali',
            'NILAI_INDIVIDU' => 'Nilai Individu',
            'AKTIF' => 'Aktif',
        ];
    }
}
