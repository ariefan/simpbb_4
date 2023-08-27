<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelayanan".
 *
 * @property string $ID
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
 * @property integer $STATUS_PELAYANAN
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
 * @property string $TGL_PENETAPAN
 * @property string $NIP_PENETAPAN
 * @property string $TGL_BERKAS_DITUNDA
 * @property string $NIP_BERKAS_DITUNDA
 * @property string $LETAK_OP
 * @property string $KECAMATAN
 * @property string $KELURAHAN
 * @property string $CETAK_TAHUN_DEPAN
 */
class Pelayanan extends \yii\db\ActiveRecord
{
    public $NOP;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelayanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NO_PELAYANAN'], 'required'],
            [['TANGGAL_PELAYANAN', 'TANGGAL_PERKIRAAN_SELESAI', 'TGL_MASUK_PENILAI', 'TGL_SELESAI', 'TGL_TERKONFIRMASI_WP', 'TGL_PENETAPAN', 'TGL_BERKAS_DITUNDA'], 'safe'],
            [['STATUS_PELAYANAN'], 'integer'],
            [['CATATAN', 'KETERANGAN'], 'string'],
            [['NAMA_PEMOHON', 'NIP_PETUGAS_PENERIMA', 'NAMA_PETUGAS_PENERIMA', 'NIP_AR', 'NAMA_AR', 'NIP_MASUK_PENILAI', 'NIP_SELESAI', 'NIP_TERKONFIRMASI_WP', 'NIP_PENETAPAN', 'NIP_BERKAS_DITUNDA'], 'string', 'max' => 300],
            [['ALAMAT_PEMOHON', 'TTD_JABATAN_KIRI', 'TTD_NAMA_KIRI', 'TTD_NIP_KIRI', 'TTD_JABATAN_KANAN', 'TTD_NAMA_KANAN', 'TTD_NIP_KANAN', 'LETAK_OP'], 'string', 'max' => 500],
            [['NO_PELAYANAN'], 'string', 'max' => 13],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_JNS_PELAYANAN'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['KECAMATAN', 'KELURAHAN'], 'string', 'max' => 200],
            [['KETERANGAN_BERKAS'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NAMA_PEMOHON' => 'Nama  Pemohon',
            'ALAMAT_PEMOHON' => 'Alamat  Pemohon',
            'NO_PELAYANAN' => 'No  Pelayanan',
            'TANGGAL_PELAYANAN' => 'Tanggal  Pelayanan',
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd  Dati2',
            'KD_KECAMATAN' => 'KEC',
            'KD_KELURAHAN' => 'KEL',
            'KD_BLOK' => 'BLK',
            'NO_URUT' => 'URUT',
            'KD_JNS_OP' => 'Kd  Jns  Op',
            'KD_JNS_PELAYANAN' => 'Kd  Jns  Pelayanan',
            'TANGGAL_PERKIRAAN_SELESAI' => 'Tanggal  Perkiraan  Selesai',
            'STATUS_PELAYANAN' => 'Status  Pelayanan',
            'NIP_PETUGAS_PENERIMA' => 'Nip  Petugas  Penerima',
            'NAMA_PETUGAS_PENERIMA' => 'Nama  Petugas  Penerima',
            'NIP_AR' => 'Nip  Ar',
            'NAMA_AR' => 'Nama  Ar',
            'CATATAN' => 'Catatan',
            'KETERANGAN' => 'Keterangan',
            'TGL_MASUK_PENILAI' => 'Tgl  Masuk  Penilai',
            'NIP_MASUK_PENILAI' => 'Nip  Masuk  Penilai',
            'TGL_SELESAI' => 'Tgl  Selesai',
            'NIP_SELESAI' => 'Nip  Selesai',
            'TGL_TERKONFIRMASI_WP' => 'Tgl  Terkonfirmasi  Wp',
            'NIP_TERKONFIRMASI_WP' => 'Nip  Terkonfirmasi  Wp',
            'TTD_JABATAN_KIRI' => 'Ttd  Jabatan  Kiri',
            'TTD_NAMA_KIRI' => 'Ttd  Nama  Kiri',
            'TTD_NIP_KIRI' => 'Ttd  Nip  Kiri',
            'TTD_JABATAN_KANAN' => 'Ttd  Jabatan  Kanan',
            'TTD_NAMA_KANAN' => 'Ttd  Nama  Kanan',
            'TTD_NIP_KANAN' => 'Ttd  Nip  Kanan',
            'TGL_PENETAPAN' => 'Tgl  Penetapan',
            'NIP_PENETAPAN' => 'Nip  Penetapan',
            'TGL_BERKAS_DITUNDA' => 'Tgl  Berkas  Ditunda',
            'NIP_BERKAS_DITUNDA' => 'Nip  Berkas  Ditunda',
            'LETAK_OP' => 'Letak  Op',
            'KECAMATAN' => 'Kecamatan',
            'KELURAHAN' => 'Kelurahan',
        ];
    }

    public function laporanKeberatan($KD_KECAMATAN,$KD_KELURAHAN,$START_DATE,$END_DATE){
        $q_tambahan = "";
        if(!empty($KD_KECAMATAN)){
            $q_tambahan .= " AND a.`KD_KECAMATAN` LIKE '$KD_KECAMATAN' ";
        }
        if(!empty($KD_KELURAHAN)){
            $q_tambahan .= " AND a.`KD_KELURAHAN` LIKE '$KD_KELURAHAN' ";
        }

        $connection = Yii::$app->db;
        $command = $connection->createCommand("
            SELECT 
              a.`NAMA_PEMOHON`,
              a.`ALAMAT_PEMOHON`,
              a.`NO_PELAYANAN`,
              a.`KD_JNS_PELAYANAN`,
              CONCAT(
                a.`KD_PROPINSI`,
                '.',
                a.`KD_DATI2`,
                '.',
                a.`KD_KECAMATAN`,
                '.',
                a.`KD_KELURAHAN`,
                '.',
                a.`KD_BLOK`,
                '.',
                a.`NO_URUT`,
                '-',
                a.`KD_JNS_OP`
              ) AS nop,
              a.`TGL_SELESAI`,
              a.TANGGAL_PERKIRAAN_SELESAI,
              d.`lb_sebelum`,
              d.`lb_sesudah`,
              d.`lt_sebelum`,
              d.`lt_sesudah`,
              d.`nama_sebelum`,
              d.`nama_sesudah`,
              d.`pbb_sebelum`,
              d.`pbb_sesudah`,
              a.`KETERANGAN` 
            FROM
              pelayanan a 
              
              LEFT JOIN histori_mutasi d 
                ON d.`no_pelayanan` = a.`NO_PELAYANAN` 
            WHERE (
                a.`KD_JNS_PELAYANAN` = '06' 
                OR a.`KD_JNS_PELAYANAN` = '07'
              ) 
              $q_tambahan
              AND a.`TANGGAL_PELAYANAN` BETWEEN '$START_DATE'
              AND '$END_DATE' 
            ORDER BY no_pelayanan 
        ");     
        return $command->queryAll();


    }

    public function getLaporan($p){
        $tgl_awal = $p['tgl_awal'];
        $tgl_akhir = $p['tgl_akhir'];
        $q = '';
        if(!empty($p['status_pelayanan'])){
            $status_pelayanan = $p['status_pelayanan'];
            $q .=  " AND STATUS_PELAYANAN = '$status_pelayanan'";
        }
        if(!empty($p['jenis_pelayanan'])){
            $jenis_pelayanan = $p['jenis_pelayanan'];
            $q .=  " AND pelayanan.KD_JNS_PELAYANAN = '$jenis_pelayanan' ";
        }
        $jenis_pelayanan = $p['jenis_pelayanan'];
        $sql = "SELECT 
                  `NO_PELAYANAN`,
                  `NAMA_PEMOHON`,
                  `TANGGAL_PELAYANAN`,
                  CONCAT(
                    `KD_PROPINSI`,
                    `KD_DATI2`,
                    `KD_KECAMATAN`,
                    `KD_KELURAHAN`,
                    `KD_BLOK`,
                    `NO_URUT`,
                    `KD_JNS_OP`
                  ) AS NOP,
                  ref_jns_pelayanan.`NM_JENIS_PELAYANAN` AS JENIS_PELAYANAN,
                  status_pelayanan.`nama` AS STATUS_PELAYANAN,
                  `KETERANGAN_BERKAS` 
                FROM
                  `pelayanan` 
                  LEFT JOIN status_pelayanan 
                    ON pelayanan.`STATUS_PELAYANAN` = status_pelayanan.`id` 
                  LEFT JOIN `ref_jns_pelayanan` 
                    ON ref_jns_pelayanan.`KD_JNS_PELAYANAN` = pelayanan.`KD_JNS_PELAYANAN` 
                WHERE TANGGAL_PELAYANAN BETWEEN '$tgl_awal' 
                  AND '$tgl_akhir' $q";
        $connection = Yii::$app->db;
        $command = $connection->createCommand($sql);
        return $command->queryAll();

    }

    public function getNoPelayanan(){
        $sql = "SELECT create_no_pelayanan() as no_pelayanan FROM ref_dati2";
        $connection = Yii::$app->db;
        $command = $connection->createCommand($sql);
        return $command->queryOne()['no_pelayanan'];
    }
}
