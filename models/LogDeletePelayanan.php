<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_delete_pelayanan".
 *
 * @property int $ID
 * @property string $TGL_DELETE
 * @property string $USER_DELETE
 * @property string $NAMA_DELETE
 * @property string $NAMA_PEMOHON
 * @property string $ALAMAT_PEMOHON
 * @property string $NO_PELAYANAN
 * @property string $TANGGAL_PELAYANAN
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $KD_JNS_PELAYANAN
 * @property string $TANGGAL_PERKIRAAN_SELESAI
 * @property int $STATUS_PELAYANAN
 * @property string $NIP_PETUGAS_PENERIMA
 * @property string $NAMA_PETUGAS_PENERIMA
 * @property string $NIP_AR
 * @property string $NAMA_AR
 * @property string $CATATAN
 * @property string $KETERANGAN
 * @property string $TGL_MASUK_PENILAI
 * @property string $NIP_MASUK_PENILAI
 * @property string $TGL_SELESAI
 * @property string $NIP_SELESAI
 * @property string $TGL_TERKONFIRMASI_WP
 * @property string $NIP_TERKONFIRMASI_WP
 * @property string $TTD_JABATAN_KIRI
 * @property string $TTD_NAMA_KIRI
 * @property string $TTD_NIP_KIRI
 * @property string $TTD_JABATAN_KANAN
 * @property string $TTD_NAMA_KANAN
 * @property string $TTD_NIP_KANAN
 */
class LogDeletePelayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_delete_pelayanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TGL_DELETE', 'TANGGAL_PELAYANAN', 'TANGGAL_PERKIRAAN_SELESAI', 'TGL_MASUK_PENILAI', 'TGL_SELESAI', 'TGL_TERKONFIRMASI_WP'], 'safe'],
            [['NO_PELAYANAN'], 'required'],
            [['STATUS_PELAYANAN'], 'integer'],
            [['CATATAN', 'KETERANGAN'], 'string'],
            [['USER_DELETE', 'NAMA_DELETE'], 'string', 'max' => 200],
            [['NAMA_PEMOHON', 'NIP_PETUGAS_PENERIMA', 'NAMA_PETUGAS_PENERIMA', 'NIP_AR', 'NAMA_AR', 'NIP_MASUK_PENILAI', 'NIP_SELESAI', 'NIP_TERKONFIRMASI_WP'], 'string', 'max' => 300],
            [['ALAMAT_PEMOHON', 'TTD_JABATAN_KIRI', 'TTD_NAMA_KIRI', 'TTD_NIP_KIRI', 'TTD_JABATAN_KANAN', 'TTD_NAMA_KANAN', 'TTD_NIP_KANAN'], 'string', 'max' => 500],
            [['NO_PELAYANAN'], 'string', 'max' => 13],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_JNS_PELAYANAN'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TGL_DELETE' => 'Tgl Delete',
            'USER_DELETE' => 'User Delete',
            'NAMA_DELETE' => 'Nama Delete',
            'NAMA_PEMOHON' => 'Nama Pemohon',
            'ALAMAT_PEMOHON' => 'Alamat Pemohon',
            'NO_PELAYANAN' => 'No Pelayanan',
            'TANGGAL_PELAYANAN' => 'Tanggal Pelayanan',
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
            'KD_BLOK' => 'Kd Blok',
            'NO_URUT' => 'No Urut',
            'KD_JNS_OP' => 'Kd Jns Op',
            'KD_JNS_PELAYANAN' => 'Kd Jns Pelayanan',
            'TANGGAL_PERKIRAAN_SELESAI' => 'Tanggal Perkiraan Selesai',
            'STATUS_PELAYANAN' => 'Status Pelayanan',
            'NIP_PETUGAS_PENERIMA' => 'Nip Petugas Penerima',
            'NAMA_PETUGAS_PENERIMA' => 'Nama Petugas Penerima',
            'NIP_AR' => 'Nip Ar',
            'NAMA_AR' => 'Nama Ar',
            'CATATAN' => 'Catatan',
            'KETERANGAN' => 'Keterangan',
            'TGL_MASUK_PENILAI' => 'Tgl Masuk Penilai',
            'NIP_MASUK_PENILAI' => 'Nip Masuk Penilai',
            'TGL_SELESAI' => 'Tgl Selesai',
            'NIP_SELESAI' => 'Nip Selesai',
            'TGL_TERKONFIRMASI_WP' => 'Tgl Terkonfirmasi Wp',
            'NIP_TERKONFIRMASI_WP' => 'Nip Terkonfirmasi Wp',
            'TTD_JABATAN_KIRI' => 'Ttd Jabatan Kiri',
            'TTD_NAMA_KIRI' => 'Ttd Nama Kiri',
            'TTD_NIP_KIRI' => 'Ttd Nip Kiri',
            'TTD_JABATAN_KANAN' => 'Ttd Jabatan Kanan',
            'TTD_NAMA_KANAN' => 'Ttd Nama Kanan',
            'TTD_NIP_KANAN' => 'Ttd Nip Kanan',
        ];
    }
}
