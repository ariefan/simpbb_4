<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lspop_".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $NO_BNG
 * @property string $NO_FORMULIR_LSPOP
 * @property string $JNS_TRANSAKSI_BNG
 * @property string $KD_JPB
 * @property int $LUAS_BNG
 * @property int $JML_LANTAI_BNG
 * @property string $THN_DIBANGUN_BNG
 * @property string $THN_RENOVASI_BNG
 * @property string $KONDISI_BNG
 * @property string $JNS_KONSTRUKSI_BNG
 * @property string $JNS_ATAP_BNG
 * @property string $KD_DINDING
 * @property string $KD_LANTAI
 * @property string $KD_LANGIT_LANGIT
 * @property int $TING_KOLOM_JPB3
 * @property int $LBR_BENT_JPB3
 * @property int $DAYA_DUKUNG_LANTAI_JPB3
 * @property int $KELILING_DINDING_JPB3
 * @property int $LUAS_MEZZANINE_JPB3
 * @property string $KLS_JPB2
 * @property string $KLS_JPB4
 * @property string $KLS_JPB5
 * @property int $LUAS_KMR_JPB5_DGN_AC_SENT
 * @property int $LUAS_RNG_LAIN_JPB5_DGN_AC_SENT
 * @property string $KLS_JPB6
 * @property string $JNS_JPB7
 * @property string $BINTANG_JPB7
 * @property int $JML_KMR_JPB7
 * @property int $LUAS_KMR_JPB7_DGN_AC_SENT
 * @property int $LUAS_KMR_LAIN_JPB7_DGN_AC_SENT
 * @property string $TYPE_JPB12
 * @property string $KLS_JPB13
 * @property int $JML_JPB13
 * @property int $LUAS_JPB13_DGN_AC_SENT
 * @property int $LUAS_JPB13_LAIN_DGN_AC_SENT
 * @property int $KAPASITAS_TANGKI_JPB15
 * @property string $LETAK_TANGKI_JPB15
 * @property string $KLS_JPB16
 * @property int $NILAI_SISTEM_BNG
 * @property int $NILAI_FORMULA
 * @property int $NILAI_INDIVIDU
 * @property string $TGL_KUNJUNGAN_KEMBALI
 * @property string $TGL_PENDATAAN_BNG
 * @property string $NM_PENDATAAN_OP
 * @property string $NIP_PENDATA_BNG
 * @property string $TGL_PEMERIKSAAN_BNG
 * @property string $NM_PEMERIKSAAN_OP
 * @property string $NIP_PEMERIKSA_BNG
 * @property int $AKTIF
 */
class Lspop extends \yii\db\ActiveRecord
{
    private $_NOP;
    public function getNOP()
    {       
       if(isset($this->_NOP)) return $this->_NOP;   
       $this->_NOP = $this->KD_PROPINSI.$this->KD_DATI2.$this->KD_KECAMATAN.$this->KD_KELURAHAN.$this->KD_BLOK.$this->NO_URUT.$this->KD_JNS_OP; 
       return $this->_NOP; 
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lspop_';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG', 'JNS_TRANSAKSI_BNG', 'KD_JPB', 'TGL_KUNJUNGAN_KEMBALI', 'TGL_PENDATAAN_BNG', 'TGL_PEMERIKSAAN_BNG'], 'required'],
            [['NO_BNG', 'LUAS_BNG', 'JML_LANTAI_BNG', 'TING_KOLOM_JPB3', 'LBR_BENT_JPB3', 'DAYA_DUKUNG_LANTAI_JPB3', 'KELILING_DINDING_JPB3', 'LUAS_MEZZANINE_JPB3', 'LUAS_KMR_JPB5_DGN_AC_SENT', 'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT', 'JML_KMR_JPB7', 'LUAS_KMR_JPB7_DGN_AC_SENT', 'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT', 'JML_JPB13', 'LUAS_JPB13_DGN_AC_SENT', 'LUAS_JPB13_LAIN_DGN_AC_SENT', 'KAPASITAS_TANGKI_JPB15', 'NILAI_SISTEM_BNG', 'NILAI_FORMULA', 'NILAI_INDIVIDU', 'AKTIF'], 'integer'],
            [['TGL_KUNJUNGAN_KEMBALI', 'TGL_PENDATAAN_BNG', 'TGL_PEMERIKSAAN_BNG'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_JPB'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_DIBANGUN_BNG', 'THN_RENOVASI_BNG'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'JNS_TRANSAKSI_BNG', 'KONDISI_BNG', 'JNS_KONSTRUKSI_BNG', 'JNS_ATAP_BNG', 'KD_DINDING', 'KD_LANTAI', 'KD_LANGIT_LANGIT', 'KLS_JPB2', 'KLS_JPB4', 'KLS_JPB5', 'KLS_JPB6', 'JNS_JPB7', 'BINTANG_JPB7', 'TYPE_JPB12', 'KLS_JPB13', 'LETAK_TANGKI_JPB15', 'KLS_JPB16'], 'string', 'max' => 1],
            [['NO_FORMULIR_LSPOP'], 'string', 'max' => 11],
            [['NM_PENDATAAN_OP', 'NIP_PENDATA_BNG', 'NM_PEMERIKSAAN_OP', 'NIP_PEMERIKSA_BNG'], 'string', 'max' => 30],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG']],
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
            'NO_FORMULIR_LSPOP' => 'No Formulir Lspop',
            'JNS_TRANSAKSI_BNG' => 'Jns Transaksi Bng',
            'KD_JPB' => 'Kd Jpb',
            'LUAS_BNG' => 'Luas Bng',
            'JML_LANTAI_BNG' => 'Jml Lantai Bng',
            'THN_DIBANGUN_BNG' => 'Thn Dibangun Bng',
            'THN_RENOVASI_BNG' => 'Thn Renovasi Bng',
            'KONDISI_BNG' => 'Kondisi Bng',
            'JNS_KONSTRUKSI_BNG' => 'Jns Konstruksi Bng',
            'JNS_ATAP_BNG' => 'Jns Atap Bng',
            'KD_DINDING' => 'Kd Dinding',
            'KD_LANTAI' => 'Kd Lantai',
            'KD_LANGIT_LANGIT' => 'Kd Langit Langit',
            'TING_KOLOM_JPB3' => 'Ting Kolom Jpb3',
            'LBR_BENT_JPB3' => 'Lbr Bent Jpb3',
            'DAYA_DUKUNG_LANTAI_JPB3' => 'Daya Dukung Lantai Jpb3',
            'KELILING_DINDING_JPB3' => 'Keliling Dinding Jpb3',
            'LUAS_MEZZANINE_JPB3' => 'Luas Mezzanine Jpb3',
            'KLS_JPB2' => 'Kls Jpb2',
            'KLS_JPB4' => 'Kls Jpb4',
            'KLS_JPB5' => 'Kls Jpb5',
            'LUAS_KMR_JPB5_DGN_AC_SENT' => 'Luas Kmr Jpb5 Dgn Ac Sent',
            'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT' => 'Luas Rng Lain Jpb5 Dgn Ac Sent',
            'KLS_JPB6' => 'Kls Jpb6',
            'JNS_JPB7' => 'Jns Jpb7',
            'BINTANG_JPB7' => 'Bintang Jpb7',
            'JML_KMR_JPB7' => 'Jml Kmr Jpb7',
            'LUAS_KMR_JPB7_DGN_AC_SENT' => 'Luas Kmr Jpb7 Dgn Ac Sent',
            'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT' => 'Luas Kmr Lain Jpb7 Dgn Ac Sent',
            'TYPE_JPB12' => 'Type Jpb12',
            'KLS_JPB13' => 'Kls Jpb13',
            'JML_JPB13' => 'Jml Jpb13',
            'LUAS_JPB13_DGN_AC_SENT' => 'Luas Jpb13 Dgn Ac Sent',
            'LUAS_JPB13_LAIN_DGN_AC_SENT' => 'Luas Jpb13 Lain Dgn Ac Sent',
            'KAPASITAS_TANGKI_JPB15' => 'Kapasitas Tangki Jpb15',
            'LETAK_TANGKI_JPB15' => 'Letak Tangki Jpb15',
            'KLS_JPB16' => 'Kls Jpb16',
            'NILAI_SISTEM_BNG' => 'Nilai Sistem Bng',
            'NILAI_FORMULA' => 'Nilai Formula',
            'NILAI_INDIVIDU' => 'Nilai Individu',
            'TGL_KUNJUNGAN_KEMBALI' => 'Tgl Kunjungan Kembali',
            'TGL_PENDATAAN_BNG' => 'Tgl Pendataan Bng',
            'NM_PENDATAAN_OP' => 'Nm Pendataan Op',
            'NIP_PENDATA_BNG' => 'Nip Pendata Bng',
            'TGL_PEMERIKSAAN_BNG' => 'Tgl Pemeriksaan Bng',
            'NM_PEMERIKSAAN_OP' => 'Nm Pemeriksaan Op',
            'NIP_PEMERIKSA_BNG' => 'Nip Pemeriksa Bng',
            'AKTIF' => 'Aktif',
        ];
    }
}
