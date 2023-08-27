<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PEMBAYARAN_SPPT".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property integer $PEMBAYARAN_SPPT_KE
 * @property string $KD_KANWIL_BANK
 * @property string $KD_KPPBB_BANK
 * @property string $KD_BANK_TUNGGAL
 * @property string $KD_BANK_PERSEPSI
 * @property string $KD_TP
 * @property integer $DENDA_SPPT
 * @property integer $JML_SPPT_YG_DIBAYAR
 * @property string $TGL_PEMBAYARAN_SPPT
 * @property string $TGL_REKAM_BYR_SPPT
 * @property string $NIP_REKAM_BYR_SPPT
 */
class PembayaranSppt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PEMBAYARAN_SPPT';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'PEMBAYARAN_SPPT_KE', 'KD_KANWIL_BANK', 'KD_KPPBB_BANK', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP', 'JML_SPPT_YG_DIBAYAR', 'TGL_PEMBAYARAN_SPPT', 'NIP_REKAM_BYR_SPPT'], 'required'],
            [['PEMBAYARAN_SPPT_KE', 'DENDA_SPPT', 'JML_SPPT_YG_DIBAYAR'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KANWIL_BANK', 'KD_KPPBB_BANK', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_PAJAK_SPPT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['TGL_PEMBAYARAN_SPPT', 'TGL_REKAM_BYR_SPPT'], 'string', 'max' => 7],
            [['NIP_REKAM_BYR_SPPT'], 'string', 'max' => 9],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'PEMBAYARAN_SPPT_KE', 'KD_KANWIL_BANK', 'KD_KPPBB_BANK', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'PEMBAYARAN_SPPT_KE', 'KD_KANWIL_BANK', 'KD_KPPBB_BANK', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP'], 'message' => 'The combination of Kd  Propinsi, Kd  Dati2, Kd  Kecamatan, Kd  Kelurahan, Kd  Blok, No  Urut, Kd  Jns  Op, Thn  Pajak  Sppt, Pembayaran  Sppt  Ke, Kd  Kanwil  Bank, Kd  Kppbb  Bank, Kd  Bank  Tunggal, Kd  Bank  Persepsi and Kd  Tp has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KD_PROPINSI' => 'Kd  Propinsi',
            'KD_DATI2' => 'Kd  Dati2',
            'KD_KECAMATAN' => 'Kd  Kecamatan',
            'KD_KELURAHAN' => 'Kd  Kelurahan',
            'KD_BLOK' => 'Kd  Blok',
            'NO_URUT' => 'No  Urut',
            'KD_JNS_OP' => 'Kd  Jns  Op',
            'THN_PAJAK_SPPT' => 'Thn  Pajak  Sppt',
            'PEMBAYARAN_SPPT_KE' => 'Pembayaran  Sppt  Ke',
            'KD_KANWIL_BANK' => 'Kd  Kanwil  Bank',
            'KD_KPPBB_BANK' => 'Kd  Kppbb  Bank',
            'KD_BANK_TUNGGAL' => 'Kd  Bank  Tunggal',
            'KD_BANK_PERSEPSI' => 'Kd  Bank  Persepsi',
            'KD_TP' => 'Kd  Tp',
            'DENDA_SPPT' => 'Denda  Sppt',
            'JML_SPPT_YG_DIBAYAR' => 'Jml  Sppt  Yg  Dibayar',
            'TGL_PEMBAYARAN_SPPT' => 'Tgl  Pembayaran  Sppt',
            'TGL_REKAM_BYR_SPPT' => 'Tgl  Rekam  Byr  Sppt',
            'NIP_REKAM_BYR_SPPT' => 'Nip  Rekam  Byr  Sppt',
        ];
    }

    public function getDataByNOPTahun($NOP,$tahun_awal,$tahun_akhir){
        return $this->find()
        ->select([
            'KD_PROPINSI,KD_DATI2,KD_KECAMATAN,KD_KELURAHAN,
            KD_BLOK,NO_URUT,KD_JNS_OP,THN_PAJAK_SPPT,TGL_PEMBAYARAN_SPPT,
            SUM(DENDA_SPPT) AS DENDA_SPPT,SUM(JML_SPPT_YG_DIBAYAR) AS JML_BAYAR'])
        ->where([
            'KD_PROPINSI'=>$NOP[0],
            'KD_DATI2'=>$NOP[1],
            'KD_KECAMATAN'=>$NOP[2],
            'KD_KELURAHAN'=>$NOP[3],
            'KD_BLOK'=>$NOP[4],
            'NO_URUT'=>$NOP[5],
            'KD_JNS_OP'=>$NOP[6],
        ])
        ->andWhere('THN_PAJAK_SPPT BETWEEN '.$tahun_awal.' AND '.$tahun_akhir)
        ->groupBy('KD_PROPINSI,KD_DATI2,KD_KECAMATAN,KD_KELURAHAN,KD_BLOK,NO_URUT,KD_JNS_OP,THN_PAJAK_SPPT')
        ->orderBy('THN_PAJAK_SPPT')
        ->asArray()
        ->all();
    }

    public function hitungRealisasiKecamatan($TAHUN){
        $data = $this->find()
        ->select('KD_KECAMATAN,SUM(JML_SPPT_YG_DIBAYAR) AS REALISASI')
        ->where(['EXTRACT(YEAR FROM TGL_PEMBAYARAN_SPPT)'=>$TAHUN])
        ->groupBy('KD_KECAMATAN')
        ->asArray()
        ->all();

        return $this->formatKeyKecamatan($data);
    }

    public function hitungTotalRealisasiTunggakan($TAHUN){
        $data = $this->find()
        ->select('SUM(JML_SPPT_YG_DIBAYAR) AS REALISASI')
        ->where(['EXTRACT(YEAR FROM TGL_PEMBAYARAN_SPPT)'=>$TAHUN])
        //->where(['YEAR(TGL_PEMBAYARAN_SPPT)'=>$TAHUN])
        ->andWhere('THN_PAJAK_SPPT<'.$TAHUN)
        ->asArray()
        ->all();

        return $data[0]['REALISASI'];
    }

    public function realisasiPerKelurahan($THN_PAJAK_SPPT,$PBB_MIN,$PBB_MAX,$TGL_REALISASI){
        $connection = Yii::$app->db;
        $sql = "SELECT 
                  NM_KECAMATAN,
                  NM_KELURAHAN,
                  SUM(POKOK_TERHUTANG) AS POKOK_TERHUTANG,
                  SUM(DENDA_BAYAR) AS DENDA_BAYAR,
                  SUM(JUMLAH_BAYAR) AS JUMLAH_BAYAR,
                  SUM(POKOK_BAYAR) AS POKOK_BAYAR,
                  SUM(
                    IF(KURANG_BAYAR > 0, KURANG_BAYAR, 0)
                  ) AS KURANG_BAYAR,
                  SUM(IF(LEBIH_BAYAR > 0, LEBIH_BAYAR, 0)) AS LEBIH_BAYAR 
                FROM
                  (SELECT 
                    sppt.KD_PROPINSI,
                    sppt.KD_DATI2,
                    sppt.KD_KECAMATAN,
                    sppt.KD_KELURAHAN,
                    sppt.`KD_BLOK`,
                    sppt.`NO_URUT`,
                    sppt.`KD_JNS_OP`,
                    PBB_YG_HARUS_DIBAYAR_SPPT AS POKOK_TERHUTANG,
                    SUM(IFNULL(DENDA_SPPT, 0)) AS DENDA_BAYAR,
                    SUM(IFNULL(JML_SPPT_YG_DIBAYAR, 0)) AS JUMLAH_BAYAR,
                    SUM(
                      IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)
                    ) AS POKOK_BAYAR,
                    PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                      IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)
                    ) AS KURANG_BAYAR,
                    SUM(
                      IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)
                    ) - PBB_YG_HARUS_DIBAYAR_SPPT AS LEBIH_BAYAR 
                  FROM
                    sppt 
                    LEFT JOIN pembayaran_sppt 
                      ON sppt.`KD_PROPINSI` = pembayaran_sppt.`KD_PROPINSI` 
                      AND sppt.`KD_DATI2` = pembayaran_sppt.`KD_DATI2` 
                      AND sppt.`KD_KECAMATAN` = pembayaran_sppt.`KD_KECAMATAN` 
                      AND sppt.`KD_KELURAHAN` = pembayaran_sppt.`KD_KELURAHAN` 
                      AND sppt.`KD_BLOK` = pembayaran_sppt.`KD_BLOK` 
                      AND sppt.`NO_URUT` = pembayaran_sppt.`NO_URUT` 
                      AND sppt.`KD_JNS_OP` = pembayaran_sppt.`KD_JNS_OP` 
                      AND sppt.`THN_PAJAK_SPPT` = pembayaran_sppt.`THN_PAJAK_SPPT`
                      AND TGL_PEMBAYARAN_SPPT <= '$TGL_REALISASI' 
                  WHERE sppt.THN_PAJAK_SPPT = $THN_PAJAK_SPPT 
                    AND PBB_YG_HARUS_DIBAYAR_SPPT BETWEEN $PBB_MIN 
                    AND $PBB_MAX 
                  GROUP BY sppt.KD_PROPINSI,
                    sppt.KD_DATI2,
                    sppt.KD_KECAMATAN,
                    sppt.KD_KELURAHAN,
                    sppt.`KD_BLOK`,
                    sppt.`NO_URUT`,
                    sppt.`KD_JNS_OP`) AS a 
                  LEFT JOIN ref_kecamatan 
                    ON a.`KD_PROPINSI` = ref_kecamatan.`KD_PROPINSI` 
                    AND a.`KD_DATI2` = ref_kecamatan.`KD_DATI2` 
                    AND a.`KD_KECAMATAN` = ref_kecamatan.`KD_KECAMATAN` 
                  LEFT JOIN ref_kelurahan 
                    ON a.`KD_PROPINSI` = ref_kelurahan.`KD_PROPINSI` 
                    AND a.`KD_DATI2` = ref_kelurahan.`KD_DATI2` 
                    AND a.`KD_KECAMATAN` = ref_kelurahan.`KD_KECAMATAN` 
                    AND a.`KD_KELURAHAN` = ref_kelurahan.`KD_KELURAHAN` 
                GROUP BY a.KD_PROPINSI,
                  a.KD_DATI2,
                  a.KD_KECAMATAN,
                  a.KD_KELURAHAN  ";

        $command = $connection->createCommand($sql);
        return $command->queryAll();
    }

    public function realisasiNop($tgl_awal,$tgl_akhir,$tahun_awal,$tahun_akhir,$kd_kec,$kd_kel,$sektor)
    {
        $w = "";
        if(!empty($kd_kec)) $w .= " AND KD_KECAMATAN='$kd_kec'";
        if(!empty($kd_kel)) $w .= " AND KD_KELURAHAN='$kd_kel'";
        if(!empty($sektor)) $w .= " AND KD_SEKTOR='$sektor'";

        $sql = "SELECT 
                  CONCAT(
                    KD_PROPINSI,
                    KD_DATI2,
                    KD_KECAMATAN,
                    KD_KELURAHAN,
                    KD_BLOK,
                    NO_URUT,
                    KD_JNS_OP
                  ) AS NOP,
                  THN_PAJAK_SPPT AS TAHUN_PAJAK,
                  NM_WP_SPPT AS NAMA_WP,
                  TGL_PEMBAYARAN_SPPT AS TGL_BAYAR,
                  DENDA_SPPT AS DENDA,
                  PBB_YG_HARUS_DIBAYAR_SPPT - DENDA_SPPT AS POKOK,
                  PBB_YG_HARUS_DIBAYAR_SPPT AS TOTAL
                FROM
                  sppt 
                  JOIN pembayaran_sppt USING (
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP,
                      THN_PAJAK_SPPT
                    ) 
                  JOIN ref_kelurahan USING (
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN
                    ) 
                WHERE TGL_PEMBAYARAN_SPPT BETWEEN '$tgl_awal' 
                  AND '$tgl_akhir' AND THN_PAJAK_SPPT BETWEEN $tahun_awal AND $tahun_akhir $w";

        $connection = Yii::$app->db;
        $command = $connection->createCommand($sql);
        return $command->queryAll();
    }


    public function getBPHTB($tahun){
      #KHUSUS GUNUNG MAS
      $connection = Yii::$app->db;
      $sql = "SELECT 
                COUNT(1) AS JML_OP,
                SUM(IFNULL(NILAI, 0)) AS NILAI_TOTAL 
              FROM
                bphtb 
              WHERE THN_PAJAK = $tahun ";

        $command = $connection->createCommand($sql);
        return $command->queryOne();
    }


    public function formatKeyTahun($data){
        $new_data = [];
        foreach ($data as $key => $value) {
            $new_data[$value['THN_PAJAK_SPPT']] = $value;
        }
        return $new_data;
    }

    public function formatKeyKecamatan($data){
        $new_data = [];
        foreach ($data as $key => $value) {
            $new_data[$value['KD_KECAMATAN']] = $value['REALISASI'];
        }
        return $new_data;
    }
}
