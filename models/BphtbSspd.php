<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bphtb_sspd".
 *
 * @property string $NO_BOOKING
 * @property string $NO_BPHTB
 * @property string $NO_PENDAFTARAN
 * @property string $TGL_DAFTAR
 * @property string $NM_WP
 * @property string $KD_PPAT
 * @property string $NM_PPAT
 * @property string $HAL
 * @property string $NO_KTP
 * @property string $NPWP
 * @property string $ALAMAT_WP
 * @property string $KELURAHAN_WP
 * @property string $KECAMATAN_WP
 * @property string $KABUPATEN_WP
 * @property string $BLOK_KAV_NO_WP
 * @property string $RT_WP
 * @property string $RW_WP
 * @property string $NO_TELP_WP
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $ALAMAT_OP
 * @property string $BLOK_KAV_NO_OP
 * @property string $RT_OP
 * @property string $RW_OP
 * @property int $LUAS_TANAH
 * @property int $LUAS_BANGUNAN
 * @property int $NJOP_TANAH_M2
 * @property int $NJOP_BANGUNAN_M2
 * @property int $NJOP_TANAH
 * @property int $NJOP_BANGUNAN
 * @property int $NJOP_TOTAL
 * @property string $JENIS_BPHTB
 * @property string $JENIS_HAK
 * @property int $HARGA_TRANSAKSI
 * @property string $NO_SERTIFIKAT
 * @property int $NPOP
 * @property int $NPOPTKP
 * @property int $NPOPKP
 * @property double $TARIF_BPHTB
 * @property int $BPHTB_TERHUTANG
 * @property int $BPHTB_PENGENAAN
 * @property int $BPTHB_HARUS_DIBAYAR
 * @property string $CATATAN
 * @property string $STATUS
 * @property string $TANGGAL_REKAM_PPAT
 * @property string $USER_REKAM_PPAT
 * @property string $STATUS_BAYAR
 * @property string $TANGGAL_TELITI
 * @property string $USER_TELITI
 * @property string $CATATAN_TELITI
 * @property string $DITERUSKAN_KE
 * @property string $TANGGAL_TERIMA_WP
 * @property string $USER_TERIMA_WP
 * @property string $NAMA_TERIMA_WP
 * @property string $CATATAN_TERIMA_WP
 */
class BphtbSspd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bphtb_sspd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NO_BPHTB'], 'required'],
            [['TGL_DAFTAR', 'TANGGAL_REKAM_PPAT', 'TANGGAL_TELITI', 'TANGGAL_TERIMA_WP'], 'safe'],
            [['LUAS_TANAH', 'LUAS_BANGUNAN', 'NJOP_TANAH_M2', 'NJOP_BANGUNAN_M2', 'NJOP_TANAH', 'NJOP_BANGUNAN', 'NJOP_TOTAL', 'HARGA_TRANSAKSI', 'NPOP', 'NPOPTKP', 'NPOPKP', 'BPHTB_TERHUTANG', 'BPHTB_PENGENAAN', 'BPTHB_HARUS_DIBAYAR'], 'integer'],
            [['TARIF_BPHTB'], 'number'],
            [['CATATAN', 'CATATAN_TELITI', 'CATATAN_TERIMA_WP'], 'string'],
            [['NO_BOOKING', 'NO_BPHTB', 'NO_PENDAFTARAN', 'NO_KTP', 'NPWP', 'USER_REKAM_PPAT', 'USER_TELITI', 'DITERUSKAN_KE', 'USER_TERIMA_WP', 'NAMA_TERIMA_WP'], 'string', 'max' => 50],
            [['NM_WP', 'HAL', 'ALAMAT_WP', 'ALAMAT_OP'], 'string', 'max' => 200],
            [['KD_PPAT', 'NO_URUT'], 'string', 'max' => 4],
            [['NM_PPAT', 'KELURAHAN_WP', 'KECAMATAN_WP', 'KABUPATEN_WP', 'NO_SERTIFIKAT'], 'string', 'max' => 100],
            [['BLOK_KAV_NO_WP', 'BLOK_KAV_NO_OP'], 'string', 'max' => 20],
            [['RT_WP', 'RW_WP', 'RT_OP', 'RW_OP'], 'string', 'max' => 5],
            [['NO_TELP_WP'], 'string', 'max' => 30],
            [['KD_PROPINSI', 'KD_DATI2', 'JENIS_BPHTB', 'JENIS_HAK'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['KD_JNS_OP', 'STATUS', 'STATUS_BAYAR'], 'string', 'max' => 1],
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
            'NO_PENDAFTARAN' => 'No Pendaftaran',
            'TGL_DAFTAR' => 'Tgl Daftar',
            'NM_WP' => 'Nm Wp',
            'KD_PPAT' => 'Kd Ppat',
            'NM_PPAT' => 'Nm Ppat',
            'HAL' => 'Hal',
            'NO_KTP' => 'No Ktp',
            'NPWP' => 'Npwp',
            'ALAMAT_WP' => 'Alamat Wp',
            'KELURAHAN_WP' => 'Kelurahan Wp',
            'KECAMATAN_WP' => 'Kecamatan Wp',
            'KABUPATEN_WP' => 'Kabupaten Wp',
            'BLOK_KAV_NO_WP' => 'Blok Kav No Wp',
            'RT_WP' => 'Rt Wp',
            'RW_WP' => 'Rw Wp',
            'NO_TELP_WP' => 'No Telp Wp',
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
            'KD_BLOK' => 'Kd Blok',
            'NO_URUT' => 'No Urut',
            'KD_JNS_OP' => 'Kd Jns Op',
            'ALAMAT_OP' => 'Alamat Op',
            'BLOK_KAV_NO_OP' => 'Blok Kav No Op',
            'RT_OP' => 'Rt Op',
            'RW_OP' => 'Rw Op',
            'LUAS_TANAH' => 'Luas Tanah',
            'LUAS_BANGUNAN' => 'Luas Bangunan',
            'NJOP_TANAH_M2' => 'Njop Tanah M2',
            'NJOP_BANGUNAN_M2' => 'Njop Bangunan M2',
            'NJOP_TANAH' => 'Njop Tanah',
            'NJOP_BANGUNAN' => 'Njop Bangunan',
            'NJOP_TOTAL' => 'Njop Total',
            'JENIS_BPHTB' => 'Jenis Bphtb',
            'JENIS_HAK' => 'Jenis Hak',
            'HARGA_TRANSAKSI' => 'Harga Transaksi',
            'NO_SERTIFIKAT' => 'No Sertifikat',
            'NPOP' => 'Npop',
            'NPOPTKP' => 'Npoptkp',
            'NPOPKP' => 'Npopkp',
            'TARIF_BPHTB' => 'Tarif Bphtb',
            'BPHTB_TERHUTANG' => 'Bphtb Terhutang',
            'BPHTB_PENGENAAN' => 'Bphtb Pengenaan',
            'BPTHB_HARUS_DIBAYAR' => 'Bpthb Harus Dibayar',
            'CATATAN' => 'Catatan',
            'STATUS' => 'Status',
            'TANGGAL_REKAM_PPAT' => 'Tanggal Rekam Ppat',
            'USER_REKAM_PPAT' => 'User Rekam Ppat',
            'STATUS_BAYAR' => 'Status Bayar',
            'TANGGAL_TELITI' => 'Tanggal Teliti',
            'USER_TELITI' => 'User Teliti',
            'CATATAN_TELITI' => 'Catatan Teliti',
            'DITERUSKAN_KE' => 'Diteruskan Ke',
            'TANGGAL_TERIMA_WP' => 'Tanggal Terima Wp',
            'USER_TERIMA_WP' => 'User Terima Wp',
            'NAMA_TERIMA_WP' => 'Nama Terima Wp',
            'CATATAN_TERIMA_WP' => 'Catatan Terima Wp',
        ];
    }
}
