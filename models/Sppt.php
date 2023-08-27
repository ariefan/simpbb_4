<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
/**
 * This is the model class for table "SPPT".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property integer $SIKLUS_SPPT
 * @property string $KD_KANWIL_BANK
 * @property string $KD_KPPBB_BANK
 * @property string $KD_BANK_TUNGGAL
 * @property string $KD_BANK_PERSEPSI
 * @property string $KD_TP
 * @property string $NM_WP_SPPT
 * @property string $JLN_WP_SPPT
 * @property string $BLOK_KAV_NO_WP_SPPT
 * @property string $RW_WP_SPPT
 * @property string $RT_WP_SPPT
 * @property string $KELURAHAN_WP_SPPT
 * @property string $KOTA_WP_SPPT
 * @property string $KD_POS_WP_SPPT
 * @property string $NPWP_SPPT
 * @property string $NO_PERSIL_SPPT
 * @property string $KD_KLS_TANAH
 * @property string $THN_AWAL_KLS_TANAH
 * @property string $KD_KLS_BNG
 * @property string $THN_AWAL_KLS_BNG
 * @property string $TGL_JATUH_TEMPO_SPPT
 * @property integer $LUAS_BUMI_SPPT
 * @property integer $LUAS_BNG_SPPT
 * @property integer $NJOP_BUMI_SPPT
 * @property integer $NJOP_BNG_SPPT
 * @property integer $NJOP_SPPT
 * @property integer $NJOPTKP_SPPT
 * @property string $NJKP_SPPT
 * @property integer $PBB_TERHUTANG_SPPT
 * @property integer $FAKTOR_PENGURANG_SPPT
 * @property integer $PBB_YG_HARUS_DIBAYAR_SPPT
 * @property string $STATUS_PEMBAYARAN_SPPT
 * @property string $STATUS_TAGIHAN_SPPT
 * @property string $STATUS_CETAK_SPPT
 * @property string $TGL_TERBIT_SPPT
 * @property string $TGL_CETAK_SPPT
 * @property string $NIP_PENCETAK_SPPT
 */
class Sppt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SPPT';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'SIKLUS_SPPT', 'KD_KANWIL_BANK', 'KD_KPPBB_BANK', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP', 'NM_WP_SPPT', 'JLN_WP_SPPT', 'TGL_JATUH_TEMPO_SPPT', 'NJOP_SPPT', 'NJOPTKP_SPPT', 'PBB_TERHUTANG_SPPT', 'PBB_YG_HARUS_DIBAYAR_SPPT', 'TGL_TERBIT_SPPT', 'NIP_PENCETAK_SPPT'], 'required'],
            [['SIKLUS_SPPT', 'LUAS_BUMI_SPPT', 'LUAS_BNG_SPPT', 'NJOP_BUMI_SPPT', 'NJOP_BNG_SPPT', 'NJOP_SPPT', 'NJOPTKP_SPPT', 'PBB_TERHUTANG_SPPT', 'FAKTOR_PENGURANG_SPPT', 'PBB_YG_HARUS_DIBAYAR_SPPT'], 'integer'],
            [['NJKP_SPPT'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KANWIL_BANK', 'KD_KPPBB_BANK', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP', 'RW_WP_SPPT'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'RT_WP_SPPT', 'KD_KLS_TANAH', 'KD_KLS_BNG'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_PAJAK_SPPT', 'THN_AWAL_KLS_TANAH', 'THN_AWAL_KLS_BNG'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'STATUS_PEMBAYARAN_SPPT', 'STATUS_TAGIHAN_SPPT', 'STATUS_CETAK_SPPT'], 'string', 'max' => 1],
            [['NM_WP_SPPT', 'JLN_WP_SPPT', 'KELURAHAN_WP_SPPT', 'KOTA_WP_SPPT'], 'string', 'max' => 30],
            [['BLOK_KAV_NO_WP_SPPT', 'NPWP_SPPT'], 'string', 'max' => 15],
            [['KD_POS_WP_SPPT', 'NO_PERSIL_SPPT'], 'string', 'max' => 5],
            [['TGL_JATUH_TEMPO_SPPT', 'TGL_TERBIT_SPPT', 'TGL_CETAK_SPPT'], 'string', 'max' => 7],
            [['NIP_PENCETAK_SPPT'], 'string', 'max' => 9],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'message' => 'The combination of Kd  Propinsi, Kd  Dati2, Kd  Kecamatan, Kd  Kelurahan, Kd  Blok, No  Urut, Kd  Jns  Op and Thn  Pajak  Sppt has already been taken.']
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
            'SIKLUS_SPPT' => 'Siklus  Sppt',
            'KD_KANWIL_BANK' => 'Kd  Kanwil  Bank',
            'KD_KPPBB_BANK' => 'Kd  Kppbb  Bank',
            'KD_BANK_TUNGGAL' => 'Kd  Bank  Tunggal',
            'KD_BANK_PERSEPSI' => 'Kd  Bank  Persepsi',
            'KD_TP' => 'Kd  Tp',
            'NM_WP_SPPT' => 'Nm  Wp  Sppt',
            'JLN_WP_SPPT' => 'Jln  Wp  Sppt',
            'BLOK_KAV_NO_WP_SPPT' => 'Blok  Kav  No  Wp  Sppt',
            'RW_WP_SPPT' => 'Rw  Wp  Sppt',
            'RT_WP_SPPT' => 'Rt  Wp  Sppt',
            'KELURAHAN_WP_SPPT' => 'Kelurahan  Wp  Sppt',
            'KOTA_WP_SPPT' => 'Kota  Wp  Sppt',
            'KD_POS_WP_SPPT' => 'Kd  Pos  Wp  Sppt',
            'NPWP_SPPT' => 'Npwp  Sppt',
            'NO_PERSIL_SPPT' => 'No  Persil  Sppt',
            'KD_KLS_TANAH' => 'Kd  Kls  Tanah',
            'THN_AWAL_KLS_TANAH' => 'Thn  Awal  Kls  Tanah',
            'KD_KLS_BNG' => 'Kd  Kls  Bng',
            'THN_AWAL_KLS_BNG' => 'Thn  Awal  Kls  Bng',
            'TGL_JATUH_TEMPO_SPPT' => 'Tgl  Jatuh  Tempo  Sppt',
            'LUAS_BUMI_SPPT' => 'Luas  Bumi  Sppt',
            'LUAS_BNG_SPPT' => 'Luas  Bng  Sppt',
            'NJOP_BUMI_SPPT' => 'Njop  Bumi  Sppt',
            'NJOP_BNG_SPPT' => 'Njop  Bng  Sppt',
            'NJOP_SPPT' => 'Njop  Sppt',
            'NJOPTKP_SPPT' => 'Njoptkp  Sppt',
            'NJKP_SPPT' => 'Njkp  Sppt',
            'PBB_TERHUTANG_SPPT' => 'Pbb  Terhutang  Sppt',
            'FAKTOR_PENGURANG_SPPT' => 'Faktor  Pengurang  Sppt',
            'PBB_YG_HARUS_DIBAYAR_SPPT' => 'Pbb  Yg  Harus  Dibayar  Sppt',
            'STATUS_PEMBAYARAN_SPPT' => 'Status  Pembayaran  Sppt',
            'STATUS_TAGIHAN_SPPT' => 'Status  Tagihan  Sppt',
            'STATUS_CETAK_SPPT' => 'Status  Cetak  Sppt',
            'TGL_TERBIT_SPPT' => 'Tgl  Terbit  Sppt',
            'TGL_CETAK_SPPT' => 'Tgl  Cetak  Sppt',
            'NIP_PENCETAK_SPPT' => 'Nip  Pencetak  Sppt',
        ];
    }

    public function getDataByNOPTahun($NOP,$tahun_awal,$tahun_akhir){
        return $this->find()
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
        ->orderBy('THN_PAJAK_SPPT')
        ->asArray()
        ->all();
    }

    public function hitungPotensiKecamatan($TAHUN){
        $data = $this->find()->select('KD_KECAMATAN,SUM(PBB_YG_HARUS_DIBAYAR_SPPT) AS POTENSI')
        ->where(['THN_PAJAK_SPPT'=>$TAHUN])
        ->groupBy('KD_KECAMATAN')
        ->asArray()
        ->all();

        return $this->formatKeyKecamatan($data,'POTENSI');
    }


    public function hitungLembarKecamatan($TAHUN){
        $data = $this->find()->select('KD_KECAMATAN,COUNT(1) AS JML_OP')
        ->where(['THN_PAJAK_SPPT'=>$TAHUN])
        ->groupBy('KD_KECAMATAN')
        ->asArray()
        ->all();

        return $this->formatKeyKecamatan($data,'JML_OP');
    }

    public function hitungLembarLunasKecamatan($TAHUN){
        $data = $this->find()->select('KD_KECAMATAN,COUNT(1) AS JML_OP')
        ->where(['THN_PAJAK_SPPT'=>$TAHUN,'STATUS_PEMBAYARAN_SPPT'=>1])
        ->groupBy('KD_KECAMATAN')
        ->asArray()
        ->all();

        return $this->formatKeyKecamatan($data,'JML_OP');
    }

    public function hitungOpPerTahun(){
        return $this->find()->select('THN_PAJAK_SPPT,COUNT(1) AS JML_OP')
        ->groupBy('THN_PAJAK_SPPT')
        ->asArray()
        ->all();
    }

    public function hitungOpPerTahunLunas(){
        return $this->find()->select('THN_PAJAK_SPPT,COUNT(1) AS JML_OP')
        ->where(['STATUS_PEMBAYARAN_SPPT'=>1])
        ->groupBy('THN_PAJAK_SPPT')
        ->asArray()
        ->all();
    }

    public function hitungOpPerTahunTidakLunas(){
        return $this->find()->select('THN_PAJAK_SPPT,COUNT(1) AS JML_OP')
        ->where(['STATUS_PEMBAYARAN_SPPT'=>0])
        ->groupBy('THN_PAJAK_SPPT')
        ->asArray()
        ->all();
    }

    public function formatKeyKecamatan($data,$str_key){
        $new_data = [];
        foreach ($data as $key => $value) {
            $new_data[$value['KD_KECAMATAN']] = $value[$str_key];
        }
        return $new_data;
    }

    public function getSkNjop($NOP,$TAHUN){
        $connection = Yii::$app->db;
        $model = $connection->createCommand("
            SELECT 
                a.KD_PROPINSI AS KD_PROPINSI,
                a.KD_DATI2 AS KD_DATI2,
                a.KD_KECAMATAN AS KD_KECAMATAN,
                a.KD_KELURAHAN AS KD_KELURAHAN,
                a.KD_BLOK AS KD_BLOK,
                a.NO_URUT AS NO_URUT,
                a.KD_JNS_OP AS KD_JNS_OP,
				        CONCAT(IFNULL(a.JALAN_OP,'-'),', ',IFNULL(a.BLOK_KAV_NO_OP,'-')) AS JALAN_OP_BARU,
                dat_subjek_pajak.`NM_WP` AS NAMA_BARU,
                dat_subjek_pajak.`JALAN_WP` AS JALAN_WP_BARU,
				        CONCAT(IFNULL(dat_subjek_pajak.JALAN_WP,'-'),', ',IFNULL(dat_subjek_pajak.BLOK_KAV_NO_WP,'-')) AS JALAN_WP_BARU,
                a.`LUAS_BUMI` AS LUAS_BUMI_BARU,
                d.LUAS_BNG AS LUAS_BNG_BARU,
                kelas_bumi.NJOP_BUMI * a.LUAS_BUMI * 1000 AS NJOP_BUMI_TOTAL_BARU,
                d.NJOP_BNG_TOTAL AS NJOP_BNG_TOTAL_BARU,
                b.NM_WP_SPPT AS NAMA_LAMA,
				        CONCAT(IFNULL(b.JLN_WP_SPPT,'-'),', ',IFNULL(b.BLOK_KAV_NO_WP_SPPT,'-')) AS JALAN_WP_LAMA,
                LUAS_BUMI_SPPT AS LUAS_BUMI_LAMA,
                LUAS_BNG_SPPT AS LUAS_BNG_LAMA,
                NJOP_BUMI_SPPT AS NJOP_BUMI_TOTAL_LAMA,
                NJOP_BNG_SPPT AS NJOP_BNG_TOTAL_LAMA 
              FROM
                spop a 
                LEFT JOIN sppt b 
                  ON a.`KD_PROPINSI` = b.`KD_PROPINSI` 
                  AND a.`KD_DATI2` = b.`KD_DATI2` 
                  AND a.`KD_KECAMATAN` = b.`KD_KECAMATAN` 
                  AND a.`KD_KELURAHAN` = b.`KD_KELURAHAN` 
                  AND a.`KD_BLOK` = b.`KD_BLOK` 
                  AND a.`NO_URUT` = b.`NO_URUT` 
                  AND a.`KD_JNS_OP` = b.`KD_JNS_OP` 
				          AND $TAHUN = b.THN_PAJAK_SPPT
                JOIN dat_subjek_pajak c 
                  ON c.`SUBJEK_PAJAK_ID` = a.`SUBJEK_PAJAK_ID` 
                LEFT JOIN 
                  (SELECT 
                    KD_PROPINSI,
                    KD_DATI2,
                    KD_KECAMATAN,
                    KD_KELURAHAN,
                    KD_BLOK,
                    NO_URUT,
                    KD_JNS_OP,
                    IF(
                      NILAI_SISTEM_BNG > 0 
                      AND (
                        NJOP_BANGUNAN IS NULL 
                        OR NJOP_BANGUNAN = 0
                      ),
                      NILAI_SISTEM_BNG,
                      NJOP_BANGUNAN * LUAS_BNG
                    ) * 1000 AS NJOP_BNG_TOTAL,
                    LUAS_BNG 
                  FROM
                    (SELECT 
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP,
                      SUM(
                        IF(
                          NILAI_INDIVIDU > 0,
                          NILAI_INDIVIDU,
                          NILAI_SISTEM_BNG
                        )
                      ) AS NILAI_SISTEM_BNG,
                      SUM(LUAS_BNG) AS LUAS_BNG 
                    FROM
                      lspop 
                    WHERE KD_PROPINSI = SUBSTRING($NOP, 1, 2) 
                      AND KD_DATI2 = SUBSTRING($NOP, 3, 2) 
                      AND KD_KECAMATAN = SUBSTRING($NOP, 5, 3) 
                      AND KD_KELURAHAN = SUBSTRING($NOP, 8, 3) 
                      AND KD_BLOK = SUBSTRING($NOP, 11, 3) 
                      AND NO_URUT = SUBSTRING($NOP, 14, 4) 
                      AND KD_JNS_OP = SUBSTRING($NOP, 18, 1) 
                    GROUP BY KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP) t1 
                    LEFT OUTER JOIN kelas_bangunan 
                      ON (
                        (
                          t1.NILAI_SISTEM_BNG / t1.LUAS_BNG
                        ) BETWEEN kelas_bangunan.NILAI_MINIMUM + 0.01 
                        AND kelas_bangunan.NILAI_MAKSIMUM
                      )) d 
                  ON a.`KD_PROPINSI` = d.`KD_PROPINSI` 
                  AND a.`KD_DATI2` = d.`KD_DATI2` 
                  AND a.`KD_KECAMATAN` = d.`KD_KECAMATAN` 
                  AND a.`KD_KELURAHAN` = d.`KD_KELURAHAN` 
                  AND a.`KD_BLOK` = d.`KD_BLOK` 
                  AND a.`NO_URUT` = d.`NO_URUT` 
                  AND a.`KD_JNS_OP` = d.`KD_JNS_OP` 
                LEFT OUTER JOIN dat_subjek_pajak 
                  ON a.SUBJEK_PAJAK_ID = dat_subjek_pajak.SUBJEK_PAJAK_ID 
                LEFT OUTER JOIN kelas_bumi 
                  ON (
                    a.NILAI_SISTEM_BUMI / a.LUAS_BUMI BETWEEN kelas_bumi.NILAI_MINIMUM + 0.01 
                    AND kelas_bumi.NILAI_MAKSIMUM
                  ) 
              WHERE a.KD_PROPINSI = SUBSTRING($NOP, 1, 2) 
                AND a.KD_DATI2 = SUBSTRING($NOP, 3, 2) 
                AND a.KD_KECAMATAN = SUBSTRING($NOP, 5, 3) 
                AND a.KD_KELURAHAN = SUBSTRING($NOP, 8, 3) 
                AND a.KD_BLOK = SUBSTRING($NOP, 11, 3) 
                AND a.NO_URUT = SUBSTRING($NOP, 14, 4) 
                AND a.KD_JNS_OP = SUBSTRING($NOP, 18, 1) 
        ");
        return $model->queryOne();
    }

    public function hitungDenda($tanggal_tempo,$pbb,$diff='bulan'){
        if($diff=='hari'){
            $tgl = $tanggal_tempo['year'].'-'.$tanggal_tempo['month'].'-'.$tanggal_tempo['day'];
            
            $tanggal_awal = date_create($tgl);
            $tanggal_akhir = date_create(date('Y-m-d'));
            
            $interval = date_diff($tanggal_akhir,$tanggal_awal);
            $tahun = $interval->format('%y');
            $bulan = $tahun*12 + $interval->format('%m');
        } elseif ($diff=='bulan') {
            if($tanggal_tempo['year'] == date('Y')){
                $bulan = date('m')-$tanggal_tempo['month'];
                if($bulan<0) $bulan = 0;
            } elseif($tanggal_tempo['year'] < date('Y')) {
                $bulan = (date('Y') - $tanggal_tempo['year'])*12 + (date('m')-$tanggal_tempo['month']);
            } else {
                $bulan = 0;
            }
        }

        if($bulan>24) $bulan = 24;   
        $denda = (0.02*$bulan)*$pbb;
        return $denda;
    }

    public function neracaBpk($thn_awal,$thn_akhir,$per_tanggal)
    {
        $sql1 = "DELETE FROM temp_pelayanan_neraca";
        $sql2 = "INSERT IGNORE INTO temp_pelayanan_neraca (NOP,KD,KETERANGAN,CATATAN,NO_PELAYANAN)
                  SELECT 
                    CONCAT(
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP
                    ) AS NOP,
                    KD_JNS_PELAYANAN AS KD,
                    pelayanan.KETERANGAN,
                    pelayanan.CATATAN,
                    pelayanan.NO_PELAYANAN
                  FROM
                    pelayanan 
                  WHERE YEAR(TANGGAL_PELAYANAN) = $thn_awal 
                    AND KD_PROPINSI <> '00' 
                    AND KD_JNS_PELAYANAN <> '01' 
                  GROUP BY KD_PROPINSI,
                    KD_DATI2,
                    KD_KECAMATAN,
                    KD_KELURAHAN,
                    KD_BLOK,
                    NO_URUT,
                    KD_JNS_OP";
        $sql3 = "DROP TABLE IF EXISTS temp_neraca_bpk";        
        $sql4 = "CREATE TABLE temp_neraca_bpk AS 
                  SELECT 
                    CONCAT(
                      dhkp.KD_PROPINSI,
                      dhkp.KD_DATI2,
                      dhkp.KD_KECAMATAN,
                      dhkp.KD_KELURAHAN,
                      dhkp.KD_BLOK,
                      dhkp.NO_URUT,
                      dhkp.KD_JNS_OP
                    ) AS NOP,
                    dhkp.THN_PAJAK_SPPT AS THN,
                    dhkp.NM_WP_SPPT AS NAMA,
                    PBB_TERHUTANG AS KETETAPAN_SEBELUM,
                    IF(pembatalan.KD IS NOT NULL,IF(PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_YG_HARUS_DIBAYAR_SPPT,0),PBB_YG_HARUS_DIBAYAR_SPPT) AS KETETAPAN_SESUDAH,
                    IF(mutasi.KD IS NOT NULL,IF(PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT,PBB_YG_HARUS_DIBAYAR_SPPT - PBB_TERHUTANG),0) AS MUTASI,
                    IF(pengurangan.KD IS NOT NULL,IF(PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT,PBB_YG_HARUS_DIBAYAR_SPPT - PBB_TERHUTANG),0) AS PENGURANGAN,
                    IF(keberatan.KD IS NOT NULL,IF(PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT,PBB_YG_HARUS_DIBAYAR_SPPT - PBB_TERHUTANG),0) AS KEBERATAN,
                    IF(pembetulan.KD IS NOT NULL,IF(PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT,PBB_YG_HARUS_DIBAYAR_SPPT - PBB_TERHUTANG),0) AS PEMBETULAN,
                    IF(pembatalan.KD IS NOT NULL,PBB_TERHUTANG,0) AS PEMBATALAN,
                    dhkp.LUAS_BUMI_SPPT AS LT_SEBELUM,
                    dhkp.LUAS_BNG_SPPT AS LB_SEBELUM,
                    sppt.LUAS_BUMI_SPPT AS LT_SESUDAH,
                    sppt.LUAS_BNG_SPPT AS LB_SESUDAH,
                    p.KETERANGAN,
                    p.NO_PELAYANAN,
                    'PERUBAHAN' AS JENIS,
                    SUM(
                      IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)
                    ) AS PEMBAYARAN_POKOK_$thn_awal,
                    SUM(IFNULL(DENDA_SPPT, 0)) AS PEMBAYARAN_DENDA_$thn_awal,
                    IF(PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                      IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)
                    )<0,0,PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                      IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)
                    )) AS SISA_PIUTANG_$thn_awal
                  FROM
                    dhkp 
                    LEFT JOIN sppt USING (
                        KD_PROPINSI,
                        KD_DATI2,
                        KD_KECAMATAN,
                        KD_KELURAHAN,
                        KD_BLOK,
                        NO_URUT,
                        KD_JNS_OP,
                        THN_PAJAK_SPPT
                      ) 
                    LEFT JOIN temp_pelayanan_neraca AS p 
                      ON p.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      )
                    LEFT JOIN temp_pelayanan_neraca AS mutasi 
                      ON mutasi.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND mutasi.KD = '02'
                    LEFT JOIN temp_pelayanan_neraca AS pengurangan 
                      ON pengurangan.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND pengurangan.KD = '08'
                    LEFT JOIN temp_pelayanan_neraca AS keberatan 
                      ON keberatan.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND keberatan.KD IN ('06','07')
                    LEFT JOIN temp_pelayanan_neraca AS pembetulan 
                      ON pembetulan.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND pembetulan.KD = '03'
                    LEFT JOIN temp_pelayanan_neraca AS pembatalan 
                      ON pembatalan.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND pembatalan.KD = '04'

                    LEFT JOIN pembayaran_sppt 
                    ON dhkp.KD_PROPINSI = pembayaran_sppt.KD_PROPINSI
                     AND dhkp.KD_DATI2 = pembayaran_sppt.KD_DATI2
                     AND dhkp.KD_KECAMATAN = pembayaran_sppt.KD_KECAMATAN
                     AND dhkp.KD_KELURAHAN = pembayaran_sppt.KD_KELURAHAN
                     AND dhkp.KD_BLOK = pembayaran_sppt.KD_BLOK
                     AND dhkp.NO_URUT = pembayaran_sppt.NO_URUT
                     AND dhkp.KD_JNS_OP = pembayaran_sppt.KD_JNS_OP
                     AND dhkp.THN_PAJAK_SPPT = pembayaran_sppt.THN_PAJAK_SPPT
                     AND YEAR(TGL_PEMBAYARAN_SPPT) = $thn_awal
                  WHERE dhkp.THN_PAJAK_SPPT = $thn_awal 
                  GROUP BY dhkp.KD_PROPINSI,
                    dhkp.KD_DATI2,
                    dhkp.KD_KECAMATAN,
                    dhkp.KD_KELURAHAN,
                    dhkp.KD_BLOK,
                    dhkp.NO_URUT,
                    dhkp.KD_JNS_OP,
                    dhkp.THN_PAJAK_SPPT";  
			
        $sql5 = "ALTER TABLE `temp_neraca_bpk` ENGINE = MYISAM";
		    $sql51 = "INSERT IGNORE INTO temp_neraca_bpk 
                  SELECT 
                    CONCAT(
                      dhkp.KD_PROPINSI,
                      dhkp.KD_DATI2,
                      dhkp.KD_KECAMATAN,
                      dhkp.KD_KELURAHAN,
                      dhkp.KD_BLOK,
                      dhkp.NO_URUT,
                      dhkp.KD_JNS_OP
                    ) AS NOP,
                    dhkp.THN_PAJAK_SPPT AS THN,
                    sppt.NM_WP_SPPT AS NAMA,
                    PBB_TERHUTANG AS KETETAPAN_SEBELUM,
                    IF(pembatalan.KD IS NOT NULL,IF(PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_YG_HARUS_DIBAYAR_SPPT,0),PBB_YG_HARUS_DIBAYAR_SPPT) AS KETETAPAN_SESUDAH,
                    IF(mutasi.KD IS NOT NULL,IF(PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT,PBB_YG_HARUS_DIBAYAR_SPPT - PBB_TERHUTANG),0) AS MUTASI,
                    IF(pengurangan.KD IS NOT NULL,IF(PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT,PBB_YG_HARUS_DIBAYAR_SPPT - PBB_TERHUTANG),0) AS PENGURANGAN,
                    IF(keberatan.KD IS NOT NULL,IF(PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT,PBB_YG_HARUS_DIBAYAR_SPPT - PBB_TERHUTANG),0) AS KEBERATAN,
                    IF(pembetulan.KD IS NOT NULL,IF(PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT>0,PBB_TERHUTANG-PBB_YG_HARUS_DIBAYAR_SPPT,PBB_YG_HARUS_DIBAYAR_SPPT - PBB_TERHUTANG),0) AS PEMBETULAN,
                    IF(pembatalan.KD IS NOT NULL,PBB_TERHUTANG,0) AS PEMBATALAN,
                    sppt.LUAS_BUMI_SPPT AS LT_SEBELUM,
                    sppt.LUAS_BNG_SPPT AS LB_SEBELUM,
                    sppt.LUAS_BUMI_SPPT AS LT_SESUDAH,
                    sppt.LUAS_BNG_SPPT AS LB_SESUDAH,
                    p.KETERANGAN,
                    p.NO_PELAYANAN,
                    'NON DHKP' AS JENIS,
                    SUM(
                      IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)
                    ) AS PEMBAYARAN_POKOK_$thn_awal,
                    SUM(IFNULL(DENDA_SPPT, 0)) AS PEMBAYARAN_DENDA_$thn_awal,
                    IF(PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                      IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)
                    )<0,0,PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                      IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)
                    )) AS SISA_PIUTANG_$thn_awal
                  FROM
                    nondhkp AS dhkp
                    LEFT JOIN sppt USING (
                        KD_PROPINSI,
                        KD_DATI2,
                        KD_KECAMATAN,
                        KD_KELURAHAN,
                        KD_BLOK,
                        NO_URUT,
                        KD_JNS_OP,
                        THN_PAJAK_SPPT
                      ) 
                    LEFT JOIN temp_pelayanan_neraca AS p 
                      ON p.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      )
                    LEFT JOIN temp_pelayanan_neraca AS mutasi 
                      ON mutasi.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND mutasi.KD = '02'
                    LEFT JOIN temp_pelayanan_neraca AS pengurangan 
                      ON pengurangan.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND pengurangan.KD = '08'
                    LEFT JOIN temp_pelayanan_neraca AS keberatan 
                      ON keberatan.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND keberatan.KD IN ('06','07')
                    LEFT JOIN temp_pelayanan_neraca AS pembetulan 
                      ON pembetulan.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND pembetulan.KD = '03'
                    LEFT JOIN temp_pelayanan_neraca AS pembatalan 
                      ON pembatalan.NOP = CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) AND pembatalan.KD = '04'

                    LEFT JOIN pembayaran_sppt 
                    ON dhkp.KD_PROPINSI = pembayaran_sppt.KD_PROPINSI
                     AND dhkp.KD_DATI2 = pembayaran_sppt.KD_DATI2
                     AND dhkp.KD_KECAMATAN = pembayaran_sppt.KD_KECAMATAN
                     AND dhkp.KD_KELURAHAN = pembayaran_sppt.KD_KELURAHAN
                     AND dhkp.KD_BLOK = pembayaran_sppt.KD_BLOK
                     AND dhkp.NO_URUT = pembayaran_sppt.NO_URUT
                     AND dhkp.KD_JNS_OP = pembayaran_sppt.KD_JNS_OP
                     AND dhkp.THN_PAJAK_SPPT = pembayaran_sppt.THN_PAJAK_SPPT
                     AND YEAR(TGL_PEMBAYARAN_SPPT) = $thn_awal
                  WHERE dhkp.THN_PAJAK_SPPT = $thn_awal 
                  GROUP BY dhkp.KD_PROPINSI,
                    dhkp.KD_DATI2,
                    dhkp.KD_KECAMATAN,
                    dhkp.KD_KELURAHAN,
                    dhkp.KD_BLOK,
                    dhkp.NO_URUT,
                    dhkp.KD_JNS_OP,
                    dhkp.THN_PAJAK_SPPT";  
        $sql55 = "ALTER TABLE `temp_neraca_bpk` ADD PRIMARY KEY (NOP,THN), ENGINE = MYISAM";
        $sql56 = "ALTER TABLE temp_neraca_bpk ADD COLUMN (CATATAN TEXT)";
        $sql57 = "UPDATE temp_neraca_bpk 
                  JOIN catatan_nop USING (NOP,THN) 
                  SET temp_neraca_bpk.CATATAN = catatan_nop.CATATAN";
        $sql6 = "DROP TABLE IF EXISTS temp_sppt";
        
        $sql71 = "CREATE TABLE temp_sppt AS
                  SELECT 
                    sppt.KD_PROPINSI,
                    sppt.KD_DATI2,
                    sppt.KD_KECAMATAN,
                    sppt.KD_KELURAHAN,
                    sppt.KD_BLOK,
                    sppt.NO_URUT,
                    sppt.KD_JNS_OP,
                    sppt.THN_PAJAK_SPPT,
                    NM_WP_SPPT,
                    LUAS_BUMI_SPPT,
                    LUAS_BNG_SPPT,
                    SUM(IFNULL(DENDA_SPPT,0)) AS DENDA,
                    SUM(IFNULL(JML_SPPT_YG_DIBAYAR,0)) AS TOTAL ,
                    PBB_YG_HARUS_DIBAYAR_SPPT,
                    0 AS ADA
                  FROM
                    sppt 
                    LEFT JOIN pembayaran_sppt
                    on sppt.KD_PROPINSI= pembayaran_sppt.KD_PROPINSI
                       AND sppt.KD_DATI2 = pembayaran_sppt.KD_DATI2
                       AND sppt.KD_KECAMATAN = pembayaran_sppt.KD_KECAMATAN
                       AND sppt.KD_KELURAHAN = pembayaran_sppt.KD_KELURAHAN
                       AND sppt.KD_BLOK = pembayaran_sppt.KD_BLOK
                       AND sppt.NO_URUT = pembayaran_sppt.NO_URUT
                       AND sppt.KD_JNS_OP = pembayaran_sppt.KD_JNS_OP
                       AND sppt.THN_PAJAK_SPPT = pembayaran_sppt.THN_PAJAK_SPPT
                       AND YEAR(TGL_PEMBAYARAN_SPPT) = $thn_awal
                      WHERE sppt.THN_PAJAK_SPPT = $thn_awal  
                  GROUP BY sppt.KD_PROPINSI,
                    sppt.KD_DATI2,
                    sppt.KD_KECAMATAN,
                    sppt.KD_KELURAHAN,
                    sppt.KD_BLOK,
                    sppt.NO_URUT,
                    sppt.KD_JNS_OP,
                    sppt.THN_PAJAK_SPPT";  
        $sql72 = "INSERT IGNORE INTO temp_sppt 
                  SELECT 
                    sppt.KD_PROPINSI,
                    sppt.KD_DATI2,
                    sppt.KD_KECAMATAN,
                    sppt.KD_KELURAHAN,
                    sppt.KD_BLOK,
                    sppt.NO_URUT,
                    sppt.KD_JNS_OP,
                    sppt.THN_PAJAK_SPPT,
                    NM_WP_SPPT,
                    LUAS_BUMI_SPPT,
                    LUAS_BNG_SPPT,
                    0,
                    0,
                    PBB_YG_HARUS_DIBAYAR_SPPT,
                    0
                  FROM sppt WHERE THN_PAJAK_SPPT = $thn_awal
                  ";

        $sql8 = "ALTER TABLE `temp_sppt` 
          ADD PRIMARY KEY (
            `KD_PROPINSI`,
            `KD_DATI2`,
            `KD_KECAMATAN`,
            `KD_KELURAHAN`,
            `KD_BLOK`,
            `NO_URUT`,
            `KD_JNS_OP`,
            `THN_PAJAK_SPPT`
          ),
          ENGINE = MYISAM";
        $sql9 = "UPDATE 
          temp_sppt 
          JOIN dhkp USING (
              `KD_PROPINSI`,
              `KD_DATI2`,
              `KD_KECAMATAN`,
              `KD_KELURAHAN`,
              `KD_BLOK`,
              `NO_URUT`,
              `KD_JNS_OP`,
              `THN_PAJAK_SPPT`
            ) SET ADA = 1";
		    $sql91 = "UPDATE 
          temp_sppt 
          JOIN nondhkp USING (
              `KD_PROPINSI`,
              `KD_DATI2`,
              `KD_KECAMATAN`,
              `KD_KELURAHAN`,
              `KD_BLOK`,
              `NO_URUT`,
              `KD_JNS_OP`,
              `THN_PAJAK_SPPT`
            ) SET ADA = 1";
        $sql10 = "INSERT INTO temp_neraca_bpk (
                    NOP,
                    THN,
                    NAMA,
                    KETETAPAN_SESUDAH,
                    LT_SESUDAH,
                    LB_SESUDAH,
                    PEMBAYARAN_DENDA_$thn_awal,
                    PEMBAYARAN_POKOK_$thn_awal,
                    SISA_PIUTANG_$thn_awal,
                    JENIS
                  ) 
                  SELECT 
                    CONCAT(
                      `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_BLOK`,
                      `NO_URUT`,
                      `KD_JNS_OP`
                    ),
                    `THN_PAJAK_SPPT`,
                    `NM_WP_SPPT`,
                    `PBB_YG_HARUS_DIBAYAR_SPPT`,
                    `LUAS_BUMI_SPPT`,
                    `LUAS_BNG_SPPT`,
                    `DENDA`,
                    `TOTAL` - `DENDA`,
                    IF(`PBB_YG_HARUS_DIBAYAR_SPPT` - (`TOTAL` - `DENDA`) <0,0,`PBB_YG_HARUS_DIBAYAR_SPPT` - (`TOTAL` - `DENDA`)),
                    'BARU' 
                  FROM
                    `temp_sppt` 
                  WHERE ADA = 0 ";

        $connection = Yii::$app->db;
        $connection->createCommand($sql1)->execute();
        $connection->createCommand($sql2)->execute();
        $connection->createCommand($sql3)->execute();
        $connection->createCommand($sql4)->execute();
        $connection->createCommand($sql5)->execute();
        $connection->createCommand($sql55)->execute();
        $connection->createCommand($sql51)->execute();
        $connection->createCommand($sql56)->execute();
        $connection->createCommand($sql57)->execute();
        $connection->createCommand($sql6)->execute();
        $connection->createCommand($sql71)->execute();        
        $connection->createCommand($sql8)->execute();
		    //$connection->createCommand($sql72)->execute();
        $connection->createCommand($sql9)->execute();
        $connection->createCommand($sql91)->execute();
        $connection->createCommand($sql10)->execute();
        for($t=$thn_awal+1;$t<=$thn_akhir;$t++){
            $t1 = $t-1;
            $sql1 = "ALTER TABLE `temp_neraca_bpk` 
                      ADD COLUMN `PEMBAYARAN_POKOK_$t` BIGINT ,
                      ADD COLUMN `PEMBAYARAN_DENDA_$t` BIGINT ,
                      ADD COLUMN `SISA_PIUTANG_$t` BIGINT";
            $sql2 = "UPDATE temp_neraca_bpk SET 
                        PEMBAYARAN_POKOK_$t = 0,
                        PEMBAYARAN_DENDA_$t = 0,
                        SISA_PIUTANG_$t = 0";
            $sql3 = "DROP TABLE temp_pembayaran";
            $sql4 = "CREATE TABLE temp_pembayaran AS 
                      SELECT 
                        CONCAT(
                          KD_PROPINSI,
                          KD_DATI2,
                          KD_KECAMATAN,
                          KD_KELURAHAN,
                          KD_BLOK,
                          NO_URUT,
                          KD_JNS_OP
                        ) AS NOP,
                        SUM(IFNULL(JML_SPPT_YG_DIBAYAR, 0)) AS TOTAL,
                        SUM(IFNULL(DENDA_SPPT, 0)) AS DENDA 
                      FROM
                        pembayaran_sppt 
                      WHERE THN_PAJAK_SPPT = $thn_awal 
                        AND YEAR(TGL_PEMBAYARAN_SPPT) = $t
						            AND TGL_PEMBAYARAN_SPPT <= '$per_tanggal'
                      GROUP BY KD_PROPINSI,
                        KD_DATI2,
                        KD_KECAMATAN,
                        KD_KELURAHAN,
                        KD_BLOK,
                        NO_URUT,
                        KD_JNS_OP";
            $sql5 = "ALTER TABLE `temp_pembayaran` 
                      ADD PRIMARY KEY (NOP),
                      ENGINE = MYISAM";
            $sql6 = "UPDATE temp_neraca_bpk 
              LEFT JOIN temp_pembayaran USING (NOP) SET 
              PEMBAYARAN_POKOK_$t = IF(IFNULL(TOTAL,0) - IFNULL(DENDA,0)<0,0,IFNULL(TOTAL,0) - IFNULL(DENDA,0)),
              PEMBAYARAN_DENDA_$t = IFNULL(DENDA,0),
              SISA_PIUTANG_$t = SISA_PIUTANG_$t1 - IF(IFNULL(TOTAL,0) - IFNULL(DENDA,0)<0,0,IFNULL(TOTAL,0) - IFNULL(DENDA,0))";
			$sql7 = "UPDATE temp_neraca_bpk SET SISA_PIUTANG_$t = 0 WHERE SISA_PIUTANG_$t < 0";

            $connection->createCommand($sql1)->execute();
            $connection->createCommand($sql2)->execute();
            $connection->createCommand($sql3)->execute();
            $connection->createCommand($sql4)->execute();
            $connection->createCommand($sql5)->execute();
			$connection->createCommand($sql6)->execute();
			$connection->createCommand($sql7)->execute();
        }

        $sql_a1 = "ALTER TABLE `temp_neraca_bpk` 
                      ADD COLUMN `PENYISIHAN` BIGINT ,
                      ADD COLUMN `SISA_PENYISIHAN` BIGINT";
        $persen_penyisihan = 0;
        if($thn_akhir-$thn_awal==0){
          //Lancar 0.5%
          $persen_penyisihan = 0.005;
        } elseif($thn_akhir-$thn_awal==1 || $thn_akhir-$thn_awal==2){
          //kurang lancar 10%
          $persen_penyisihan = 0.1;
        } elseif ($thn_akhir-$thn_awal>2 && $thn_akhir-$thn_awal<=5) {
          //diragukan 50%
          $persen_penyisihan = 0.5;
        } elseif ($thn_akhir-$thn_awal>5) {
          //macet 100%
          $persen_penyisihan = 1;
        }
        $sql_a2 = "UPDATE temp_neraca_bpk 
        SET PENYISIHAN = SISA_PIUTANG_$thn_akhir * $persen_penyisihan,
        SISA_PENYISIHAN = SISA_PIUTANG_$thn_akhir - SISA_PIUTANG_$thn_akhir * $persen_penyisihan";

        $connection->createCommand($sql_a1)->execute();
        $connection->createCommand($sql_a2)->execute();
    }

    public function neracaKppSummary($thn_awal,$thn_akhir,$per_tanggal,$tahun_neraca)
    {
        $sql1 = "SELECT * FROM sisa_piutang WHERE thn_neraca=".($tahun_neraca-1);
        $sql2 = "SELECT 
                    THN_PAJAK_SPPT,
                    SUM(IFNULL(JML_SPPT_YG_DIBAYAR, 0)) AS TOTAL,
                    SUM(IFNULL(DENDA_SPPT, 0)) AS DENDA 
                  FROM
                    pembayaran_sppt 
                  WHERE (
                      TGL_PEMBAYARAN_SPPT BETWEEN CONCAT(
                        SUBSTR('$per_tanggal', 1, 4),
                        '-01-01'
                      ) 
                      AND '$per_tanggal'
                    ) 
                    AND (
                      THN_PAJAK_SPPT BETWEEN $thn_awal 
                      AND $thn_akhir
                    )
                  GROUP BY THN_PAJAK_SPPT";
        $connection = Yii::$app->db;
		//echo $sql1;
        $sisa = $connection->createCommand($sql1)->queryAll();
        $pembayaran = $connection->createCommand($sql2)->queryAll();

        $data = [];
        foreach ($sisa as $key => $value) {
          $data[$value['THN_PIUTANG']]['SISA'] = $value['TOTAL'];
          $data[$value['THN_PIUTANG']]['TOTAL'] = 0;
          $data[$value['THN_PIUTANG']]['DENDA'] = 0;
          $data[$value['THN_PIUTANG']]['POKOK'] = 0;
        }
        foreach ($pembayaran as $key=>$value) {
          $data[$value['THN_PAJAK_SPPT']]['TOTAL'] = $value['TOTAL'];
          $data[$value['THN_PAJAK_SPPT']]['DENDA'] = $value['DENDA'];
          $data[$value['THN_PAJAK_SPPT']]['POKOK'] = $value['TOTAL']-$value['DENDA'];
        }
        //print_r($data);exit;
        foreach ($data as $thn => $value) {
          $data[$thn]['PENYISIHAN'] =  $tahun_neraca-$thn<=5 ? ($value['SISA'] - $value['POKOK'])*0.5 : ($value['SISA'] - $value['POKOK'])*1; 
        }

        return $data;

    }

    public function neracaBpkSummary($thn_awal,$thn_akhir,$per_tanggal)
    {
      $sql1 = "SELECT 
                  THN_PAJAK_SPPT,
                  SUM(PBB_YG_HARUS_DIBAYAR_SPPT) AS KETETAPAN
                FROM
                  sppt 
                WHERE THN_PAJAK_SPPT BETWEEN $thn_awal 
                  AND $thn_akhir
                GROUP BY THN_PAJAK_SPPT 
                ORDER BY THN_PAJAK_SPPT DESC";
	  $sql2 = "SELECT 
				  THN_PAJAK_SPPT,
				  SUM(
					IF(
					  POKOK - POKOK_BAYAR <= 0,
					  POKOK,
					  POKOK_BAYAR
					)
				  ) AS POKOK,
				  SUM(DENDA_BAYAR) AS DENDA 
				FROM  
				  (SELECT 
					THN_PAJAK_SPPT,
					PBB_YG_HARUS_DIBAYAR_SPPT AS POKOK,
					SUM(JML_SPPT_YG_DIBAYAR - DENDA_SPPT) AS POKOK_BAYAR,
					SUM(DENDA_SPPT) AS DENDA_BAYAR 
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
				  WHERE THN_PAJAK_SPPT BETWEEN $thn_awal AND $thn_akhir-1
					AND YEAR(TGL_PEMBAYARAN_SPPT) < $thn_akhir 
				  GROUP BY KD_PROPINSI,
					KD_DATI2,
					KD_KECAMATAN,
					KD_KELURAHAN,
					KD_BLOK,
					NO_URUT,
					KD_JNS_OP,
					THN_PAJAK_SPPT) AS a 
				GROUP BY THN_PAJAK_SPPT ";      

      $sql3 = "SELECT 
                  THN_PAJAK_SPPT,
                  SUM(IF(JML_SPPT_YG_DIBAYAR-DENDA_SPPT<0,0,JML_SPPT_YG_DIBAYAR-DENDA_SPPT)) AS POKOK,
                  SUM(DENDA_SPPT) AS DENDA 
                FROM
                  pembayaran_sppt 
                WHERE THN_PAJAK_SPPT BETWEEN $thn_awal 
                  AND $thn_akhir
                  AND TGL_PEMBAYARAN_SPPT <= '$per_tanggal'
                  AND YEAR(TGL_PEMBAYARAN_SPPT)>=$thn_akhir 
                GROUP BY THN_PAJAK_SPPT
                ORDER BY THN_PAJAK_SPPT DESC ";
      $connection = Yii::$app->db;
      $ketetapan = $connection->createCommand($sql1)->queryAll();
      $byr_before = $connection->createCommand($sql2)->queryAll();
      $byr_now = $connection->createCommand($sql3)->queryAll();
      $data = [];
      foreach ($ketetapan as $key => $value) {
        $data[$value['THN_PAJAK_SPPT']]['KETETAPAN'] = $value['KETETAPAN'];
      }

      foreach ($byr_before as $key => $value) {
        $data[$value['THN_PAJAK_SPPT']]['POKOK_SEBELUM'] = $value['POKOK'];
        $data[$value['THN_PAJAK_SPPT']]['DENDA_SEBELUM'] = $value['DENDA'];
      }

      foreach ($byr_now as $key => $value) {
        $data[$value['THN_PAJAK_SPPT']]['POKOK_NOW'] = $value['POKOK'];
        $data[$value['THN_PAJAK_SPPT']]['DENDA_NOW'] = $value['DENDA'];
      }
      foreach ($data as $thn => $value) {
        $persen_penyisihan = 0;
        if($thn_akhir-$thn==0){
          //Lancar 0.5%
          $persen_penyisihan = 0.005;
          $data[$thn]['SISA_AWAL'] = $value['KETETAPAN'];
          $data[$thn]['SISA'] = $value['KETETAPAN'] - $value['POKOK_NOW'];
        } elseif($thn_akhir-$thn==1 || $thn_akhir-$thn==2){
          //kurang lancar 10%
          $persen_penyisihan = 0.1;
          $data[$thn]['SISA_AWAL'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'];
          $data[$thn]['SISA'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'] - $value['POKOK_NOW'];
        } elseif ($thn_akhir-$thn>2 && $thn_akhir-$thn<=5) {
          //diragukan 50%
          $persen_penyisihan = 0.5;
          $data[$thn]['SISA_AWAL'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'];
          $data[$thn]['SISA'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'] - $value['POKOK_NOW'];
        } elseif ($thn_akhir-$thn>5) {
          //macet 100%
          $persen_penyisihan = 1;
          $data[$thn]['SISA_AWAL'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'];
          $data[$thn]['SISA'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'] - $value['POKOK_NOW'];
        }
        $data[$thn]['PENYISIHAN_PIUTANG'] = $data[$thn]['SISA'] * $persen_penyisihan;
        $data[$thn]['NETTO'] = $data[$thn]['SISA'] - $data[$thn]['PENYISIHAN_PIUTANG'];

      }
      return $data;

    }

    public function neracaKpp($thn_awal,$thn_akhir,$per_tanggal)
    {
      $persen_penyisihan = 0;
      if($thn_akhir-$thn_awal==0){
        //Lancar 0.5%
        $persen_penyisihan = 0.005;
      } elseif($thn_akhir-$thn_awal==1 || $thn_akhir-$thn_awal==2){
        //kurang lancar 10%
        $persen_penyisihan = 0.1;
      } elseif ($thn_akhir-$thn_awal>2 && $thn_akhir-$thn_awal<=5) {
        //diragukan 50%
        $persen_penyisihan = 0.5;
      } elseif ($thn_akhir-$thn_awal>5) {
        //macet 100%
        $persen_penyisihan = 1;
      }
      $sql1 = "DROP TABLE IF EXISTS temp_neraca_kpp";
      $sql2 = "CREATE TABLE temp_neraca_kpp AS
                SELECT 
                  CONCAT(a.KD_PROPINSI,
                  a.KD_DATI2,
                  a.KD_KECAMATAN,
                  a.KD_KELURAHAN,
                  a.KD_BLOK,
                  a.NO_URUT,
                  a.KD_JNS_OP) AS NOP,
                  NM_WP_SPPT AS NAMA,
                  PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                    IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                  ) AS KETETAPAN,
                  SUM(
                    IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                  ) AS POKOK_BAYAR,
                  SUM(IFNULL(c.DENDA_SPPT, 0)) AS DENDA_BAYAR,
                  GROUP_CONCAT(c.TGL_PEMBAYARAN_SPPT) AS TGL_BAYAR,
                  PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                    IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                  ) - SUM(
                    IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                  ) AS SISA_PIUTANG,
                  PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                    IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                  ) - SUM(
                    IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                  ) * $persen_penyisihan AS PENYISIHAN,
                  PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                    IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                  ) - SUM(
                    IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                  ) - (
                    PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                      IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                    ) - SUM(
                      IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                    ) * $persen_penyisihan
                  ) AS NETTO 
                FROM
                  sppt a 
                  LEFT JOIN pembayaran_sppt b 
                    ON a.KD_PROPINSI = b.KD_PROPINSI 
                    AND a.KD_DATI2 = b.KD_DATI2 
                    AND a.KD_KECAMATAN = b.KD_KECAMATAN 
                    AND a.KD_KELURAHAN = b.KD_KELURAHAN 
                    AND a.KD_BLOK = b.KD_BLOK 
                    AND a.NO_URUT = b.NO_URUT 
                    AND a.KD_JNS_OP = b.KD_JNS_OP 
                    AND a.THN_PAJAK_SPPT = b.THN_PAJAK_SPPT 
                    AND YEAR(b.TGL_PEMBAYARAN_SPPT) < 2013 
                  LEFT JOIN pembayaran_sppt c 
                    ON a.KD_PROPINSI = c.KD_PROPINSI 
                    AND a.KD_DATI2 = c.KD_DATI2 
                    AND a.KD_KECAMATAN = c.KD_KECAMATAN 
                    AND a.KD_KELURAHAN = c.KD_KELURAHAN 
                    AND a.KD_BLOK = c.KD_BLOK 
                    AND a.NO_URUT = c.NO_URUT 
                    AND a.KD_JNS_OP = c.KD_JNS_OP 
                    AND a.THN_PAJAK_SPPT = c.THN_PAJAK_SPPT 
                    AND YEAR(c.TGL_PEMBAYARAN_SPPT) BETWEEN 2013 
                    AND $thn_akhir 
                WHERE a.THN_PAJAK_SPPT = $thn_awal 
                GROUP BY a.KD_PROPINSI,
                  a.KD_DATI2,
                  a.KD_KECAMATAN,
                  a.KD_KELURAHAN,
                  a.KD_BLOK,
                  a.NO_URUT,
                  a.KD_JNS_OP,
                  a.THN_PAJAK_SPPT 
                HAVING SISA_PIUTANG > 0 ";
    
      $connection = Yii::$app->db;
      $connection->createCommand($sql1)->execute();
      $connection->createCommand($sql2)->execute();
        
    }

    public function laporanPenetapan($thn_awal,$start_date=NULL,$end_date=NULL)
    {
        if(empty($start_date)) $start_date = date('Y').'01-01';
        if(empty($end_date)) $end_date = date('Y').'12-31';
        $sql1 = "DELETE FROM temp_pelayanan";
        $sql2 = "INSERT IGNORE INTO temp_pelayanan (NOP,KD,KETERANGAN,CATATAN,NO_PELAYANAN)
                  SELECT 
                    CONCAT(
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP
                    ) AS NOP,
                    KD_JNS_PELAYANAN AS KD,
                    pelayanan.KETERANGAN,
                    pelayanan.CATATAN,
                    pelayanan.NO_PELAYANAN
                  FROM
                    pelayanan 
                  WHERE TANGGAL_PELAYANAN BETWEEN '$start_date' AND '$end_date' 
                    AND KD_PROPINSI <> '00' 
                    AND KD_JNS_PELAYANAN NOT IN ('04','08')
                  ";
        $sql3 = "DROP TABLE IF EXISTS temp_laporan_penetapan";
        $sql4 = "CREATE TABLE temp_laporan_penetapan AS 
                  SELECT 
                    temp_pelayanan.`NO_PELAYANAN`,
                    temp_pelayanan.`KD`,
                    spop.`NO_FORMULIR_SPOP` AS NO_FORMULIR,
                    sppt.`TGL_CETAK_SPPT` AS TANGGAL_CETAK,
                    spop.`TGL_PENDATAAN_OP` AS TANGGAL_INPUT,
                    dhkp.`NM_WP_SPPT` AS NAMA_SEBELUM,
                    CONCAT(
                      dhkp.KD_PROPINSI,
                      '.',
                      dhkp.KD_DATI2,
                      '.',
                      dhkp.KD_KECAMATAN,
                      '.',
                      dhkp.KD_KELURAHAN,
                      '.',
                      dhkp.KD_BLOK,
                      '-',
                      dhkp.NO_URUT,
                      '.',
                      dhkp.KD_JNS_OP
                    ) AS NOP_SEBELUM,
                    dhkp.`LUAS_BUMI_SPPT` AS LT_SEBELUM,
                    dhkp.`LUAS_BNG_SPPT` AS LB_SEBELUM,
                    dhkp.`PBB_TERHUTANG` AS KETETAPAN_LAMA,
                    sppt.`NM_WP_SPPT` AS NAMA_BARU,
                    CONCAT(
                      sppt.KD_PROPINSI,
                      '.',
                      sppt.KD_DATI2,
                      '.',
                      sppt.KD_KECAMATAN,
                      '.',
                      sppt.KD_KELURAHAN,
                      '.',
                      sppt.KD_BLOK,
                      '-',
                      sppt.NO_URUT,
                      '.',
                      sppt.KD_JNS_OP
                    ) AS NOP_BARU,
                    sppt.`LUAS_BUMI_SPPT` AS LT_BARU,
                    sppt.`LUAS_BNG_SPPT` AS LB_BARU,
                    sppt.`PBB_YG_HARUS_DIBAYAR_SPPT` AS KETETAPAN_BARU,
                    sppt.`PBB_YG_HARUS_DIBAYAR_SPPT` - dhkp.`PBB_TERHUTANG` AS SELISIH_KETETAPAN 
                  FROM
                    temp_pelayanan 
                    LEFT JOIN dhkp 
                      ON CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) = temp_pelayanan.NOP 
                    LEFT JOIN sppt USING (
                        KD_PROPINSI,
                        KD_DATI2,
                        KD_KECAMATAN,
                        KD_KELURAHAN,
                        KD_BLOK,
                        NO_URUT,
                        KD_JNS_OP,
                        THN_PAJAK_SPPT
                      ) 
                    LEFT JOIN spop USING (
                        KD_PROPINSI,
                        KD_DATI2,
                        KD_KECAMATAN,
                        KD_KELURAHAN,
                        KD_BLOK,
                        NO_URUT,
                        KD_JNS_OP
                      ) 
                  WHERE dhkp.`THN_PAJAK_SPPT` = $thn_awal 
        ";
        
        $sql5 = "INSERT INTO `temp_laporan_penetapan` (
                    `NO_PELAYANAN`,
                    `KD`,
                    `NO_FORMULIR`,
                    `TANGGAL_CETAK`,
                    `TANGGAL_INPUT`,
                    `NAMA_SEBELUM`,
                    `NOP_SEBELUM`,
                    `LT_SEBELUM`,
                    `LB_SEBELUM`,
                    `KETETAPAN_LAMA`,
                    `NAMA_BARU`,
                    `NOP_BARU`,
                    `LT_BARU`,
                    `LB_BARU`,
                    `KETETAPAN_BARU`,
                    `SELISIH_KETETAPAN`
                  ) 
                  SELECT 
                    temp_histori_mutasi.`no_pelayanan`,
                    '01',
                    spop.`NO_FORMULIR_SPOP`,
                    sppt.`TGL_CETAK_SPPT`,
                    spop.`TGL_PENDATAAN_OP`,
                    `nama_sebelum`,
                    `nop_sebelum`,
                    `lt_sebelum`,
                    `lb_sebelum`,
                    `pbb_sebelum`,
                    `nama_sesudah`,
                    `nop_sesudah`,
                    `lt_sesudah`,
                    `lb_sesudah`,
                    `pbb_sesudah`,
                    `pbb_sesudah` - `pbb_sebelum` 
                  FROM
                    temp_histori_mutasi 
                    LEFT JOIN spop 
                      ON spop.KD_PROPINSI = SUBSTRING(temp_histori_mutasi.`nop_sesudah`,1,2) 
                      AND spop.KD_DATI2 = SUBSTRING(temp_histori_mutasi.`KD_DATI2`, 3, 2)
                      AND spop.KD_KECAMATAN = SUBSTRING(temp_histori_mutasi.`KD_KECAMATAN`, 5, 3) 
                      AND spop.KD_KELURAHAN = SUBSTRING(temp_histori_mutasi.`KD_KELURAHAN`, 8, 3) 
                      AND spop.KD_BLOK = SUBSTRING(temp_histori_mutasi.`KD_BLOK`, 11, 3)
                      AND spop.NO_URUT = SUBSTRING(temp_histori_mutasi.`NO_URUT`, 14, 4) 
                      AND spop.KD_JNS_OP = SUBSTRING(temp_histori_mutasi.`KD_JNS_OP` , 18, 1)
                    LEFT JOIN sppt 
                      ON sppt.KD_PROPINSI = SUBSTRING(temp_histori_mutasi.`nop_sesudah`,1,2) 
                      AND sppt.KD_DATI2 = SUBSTRING(temp_histori_mutasi.`KD_DATI2`, 3, 2)
                      AND sppt.KD_KECAMATAN = SUBSTRING(temp_histori_mutasi.`KD_KECAMATAN`, 5, 3) 
                      AND sppt.KD_KELURAHAN = SUBSTRING(temp_histori_mutasi.`KD_KELURAHAN`, 8, 3) 
                      AND sppt.KD_BLOK = SUBSTRING(temp_histori_mutasi.`KD_BLOK`, 11, 3)
                      AND sppt.NO_URUT = SUBSTRING(temp_histori_mutasi.`NO_URUT`, 14, 4) 
                      AND sppt.KD_JNS_OP = SUBSTRING(temp_histori_mutasi.`KD_JNS_OP` , 18, 1)
                      AND sppt.`THN_PAJAK_SPPT` = $thn_awal ";
        $connection = Yii::$app->db;
        $connection->createCommand($sql1)->execute();
        $connection->createCommand($sql2)->execute();
        $connection->createCommand($sql3)->execute();
        $connection->createCommand($sql4)->execute();
        $this->prepareDataBaru($start_date,$end_date);
        $connection->createCommand($sql5)->execute();
    }

    public function prepareDataBaru($start_date,$end_date)
    {
        $sql1 = "DROP TABLE IF EXISTS temp_histori_mutasi";
        $sql2 = "CREATE TABLE temp_histori_mutasi AS 
                  SELECT 
                    SUBSTRING(nop_sesudah, 1, 2) AS KD_PROPINSI,
                    SUBSTRING(nop_sesudah, 3, 2) AS KD_DATI2,
                    SUBSTRING(nop_sesudah, 5, 3) AS KD_KECAMATAN,
                    SUBSTRING(nop_sesudah, 8, 3) AS KD_KELURAHAN,
                    SUBSTRING(nop_sesudah, 11, 3) AS KD_BLOK,
                    SUBSTRING(nop_sesudah, 14, 4) AS NO_URUT,
                    SUBSTRING(nop_sesudah, 18, 1) AS KD_JNS_OP,
                    pelayanan.`TANGGAL_PELAYANAN`,
                    `no_pelayanan`,
                    `nop_sebelum`,
                    `nama_sebelum`,
                    `lt_sebelum`,
                    `lb_sebelum`,
                    `pbb_sebelum`,
                    `nop_sesudah`,
                    `nama_sesudah`,
                    `lt_sesudah`,
                    `lb_sesudah`,
                    `pbb_sesudah`,KETERANGAN,CATATAN
                  FROM
                    histori_mutasi 
                    JOIN pelayanan USING (no_pelayanan) 
                  WHERE KD_JNS_PELAYANAN = '01' 
                    AND pelayanan.`TANGGAL_PELAYANAN` BETWEEN '$start_date' 
                    AND '$end_date' ";
        $sql3 = "ALTER TABLE `temp_histori_mutasi` 
                  ADD FULLTEXT INDEX (
                    `KD_PROPINSI`,
                    `KD_DATI2`,
                    `KD_KECAMATAN`,
                    `KD_KELURAHAN`,
                    `KD_BLOK`,
                    `NO_URUT`,
                    `KD_JNS_OP`
                  ),
                  ENGINE = MYISAM ";
        $connection = Yii::$app->db;
        $connection->createCommand($sql1)->execute();
        $connection->createCommand($sql2)->execute();
        $connection->createCommand($sql3)->execute();

    }

    public function laporanPelayanan($thn_awal,$jns_pelayanan,$start_date,$end_date)
    {
        $connection = Yii::$app->db;
        $data_baru = false;
        if(($key = array_search('01', $jns_pelayanan)) !== false) {
            $data_baru = true;
            unset($jns_pelayanan[$key]);
        }

        $jns_pelayanan = implode(',', $jns_pelayanan);
        $sql1 = "DELETE FROM temp_pelayanan";
        $connection->createCommand($sql1)->execute();

        if(!empty($jns_pelayanan)){
            $sql2 = "INSERT IGNORE INTO temp_pelayanan (NOP,KD,KETERANGAN,CATATAN,NO_PELAYANAN,TGL)
                  SELECT 
                    CONCAT(
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP
                    ) AS NOP,
                    KD_JNS_PELAYANAN AS KD,
                    pelayanan.KETERANGAN,
                    pelayanan.CATATAN,
                    pelayanan.NO_PELAYANAN,
                    pelayanan.TANGGAL_PELAYANAN
                  FROM
                    pelayanan 
                  WHERE TANGGAL_PELAYANAN BETWEEN '$start_date' AND '$end_date' 
                    AND KD_PROPINSI <> '00' 
                    AND KD_JNS_PELAYANAN IN ($jns_pelayanan)
                  ";
            $connection->createCommand($sql2)->execute();
        }
        
        $sql3 = "DROP TABLE IF EXISTS temp_laporan_pelayanan";
        $sql4 = "CREATE TABLE temp_laporan_pelayanan AS
                  SELECT 
                    temp_pelayanan.`NO_PELAYANAN`,
                    temp_pelayanan.`KD`,
                    temp_pelayanan.`KETERANGAN`,
                    temp_pelayanan.`CATATAN`,
                    temp_pelayanan.`TGL`,
                    dhkp.`NM_WP_SPPT` AS NAMA_SEBELUM,
                    CONCAT(
                      dhkp.KD_PROPINSI,
                      '.',
                      dhkp.KD_DATI2,
                      '.',
                      dhkp.KD_KECAMATAN,
                      '.',
                      dhkp.KD_KELURAHAN,
                      '.',
                      dhkp.KD_BLOK,
                      '-',
                      dhkp.NO_URUT,
                      '.',
                      dhkp.KD_JNS_OP
                    ) AS NOP_SEBELUM,
                    dhkp.`LUAS_BUMI_SPPT` AS LT_SEBELUM,
                    dhkp.`LUAS_BNG_SPPT` AS LB_SEBELUM,
                    dhkp.`PBB_TERHUTANG` AS KETETAPAN_LAMA,
                    sppt.`NM_WP_SPPT` AS NAMA_BARU,
                    CONCAT(
                      sppt.KD_PROPINSI,
                      '.',
                      sppt.KD_DATI2,
                      '.',
                      sppt.KD_KECAMATAN,
                      '.',
                      sppt.KD_KELURAHAN,
                      '.',
                      sppt.KD_BLOK,
                      '-',
                      sppt.NO_URUT,
                      '.',
                      sppt.KD_JNS_OP
                    ) AS NOP_BARU,
                    sppt.`LUAS_BUMI_SPPT` AS LT_BARU,
                    sppt.`LUAS_BNG_SPPT` AS LB_BARU,
                    sppt.`PBB_YG_HARUS_DIBAYAR_SPPT` AS KETETAPAN_BARU,
                    sppt.`PBB_YG_HARUS_DIBAYAR_SPPT` - dhkp.`PBB_TERHUTANG` AS SELISIH_KETETAPAN 
                  FROM
                    temp_pelayanan 
                    LEFT JOIN dhkp 
                      ON CONCAT(
                        dhkp.KD_PROPINSI,
                        dhkp.KD_DATI2,
                        dhkp.KD_KECAMATAN,
                        dhkp.KD_KELURAHAN,
                        dhkp.KD_BLOK,
                        dhkp.NO_URUT,
                        dhkp.KD_JNS_OP
                      ) = temp_pelayanan.NOP 
                    LEFT JOIN sppt USING (
                        KD_PROPINSI,
                        KD_DATI2,
                        KD_KECAMATAN,
                        KD_KELURAHAN,
                        KD_BLOK,
                        NO_URUT,
                        KD_JNS_OP,
                        THN_PAJAK_SPPT
                      ) 
                  WHERE dhkp.`THN_PAJAK_SPPT` = $thn_awal";
        
        
        $connection->createCommand($sql3)->execute();
        $connection->createCommand($sql4)->execute();

        if($data_baru){
            $this->prepareDataBaru($start_date,$end_date);
            $sql5 = "INSERT INTO `temp_laporan_pelayanan` (
                      `NO_PELAYANAN`,
                      `KD`,
                      TGL,
                      `KETERANGAN`,
                      CATATAN,
                      `NAMA_SEBELUM`,
                      `NOP_SEBELUM`,
                      `LT_SEBELUM`,
                      `LB_SEBELUM`,
                      `KETETAPAN_LAMA`,
                      `NAMA_BARU`,
                      `NOP_BARU`,
                      `LT_BARU`,
                      `LB_BARU`,
                      `KETETAPAN_BARU`,
                      `SELISIH_KETETAPAN`
                    ) 
                    SELECT 
                      temp_histori_mutasi.`no_pelayanan`,
                      '01',
                      TANGGAL_PELAYANAN,
                      `KETERANGAN`,
                      `CATATAN`,
                      `nama_sebelum`,
                      `nop_sebelum`,
                      `lt_sebelum`,
                      `lb_sebelum`,
                      `pbb_sebelum`,
                      `nama_sesudah`,
                      `nop_sesudah`,
                      `lt_sesudah`,
                      `lb_sesudah`,
                      `pbb_sesudah`,
                      `pbb_sesudah` - `pbb_sebelum` 
                    FROM
                      temp_histori_mutasi 
                      LEFT JOIN sppt 
                        ON sppt.KD_PROPINSI = temp_histori_mutasi.`KD_PROPINSI` 
                        AND sppt.KD_DATI2 = temp_histori_mutasi.`KD_DATI2` 
                        AND sppt.KD_KECAMATAN = temp_histori_mutasi.`KD_KECAMATAN` 
                        AND sppt.KD_KELURAHAN = temp_histori_mutasi.`KD_KELURAHAN` 
                        AND sppt.KD_BLOK = temp_histori_mutasi.`KD_BLOK` 
                        AND sppt.NO_URUT = temp_histori_mutasi.`NO_URUT` 
                        AND sppt.KD_JNS_OP = temp_histori_mutasi.`KD_JNS_OP` 
                        AND sppt.`THN_PAJAK_SPPT` = $thn_awal
              ";
            $connection->createCommand($sql5)->execute();
        }
        
        
    }

    public function getNeraca()
    {
      $query = TempNeracaBpk::find();

      $provider = new ActiveDataProvider([
          'query' => $query,
          'pagination' => [
              'pageSize' => 20,
          ],
      ]);

      return $provider;
    }

    public function getPenetapan()
    {
      $query = TempLaporanPenetapan::find();

      $provider = new ActiveDataProvider([
          'query' => $query,
          'pagination' => [
              'pageSize' => 20,
          ],
      ]);

      return $provider;
    }

    public function getValidasi($NOP,$TAHUN_AWAL,$TAHUN_AKHIR,$TGL_CUT_OFF){
        $connection = Yii::$app->db;
        $model = $connection->createCommand("
			SELECT 
			  sppt.KD_PROPINSI,
			  sppt.KD_DATI2,
			  sppt.KD_KECAMATAN,
			  sppt.KD_KELURAHAN,
			  sppt.KD_BLOK,
			  sppt.NO_URUT,
			  sppt.KD_JNS_OP,
			  ref_kecamatan.NM_KECAMATAN,
			  ref_kelurahan.NM_KELURAHAN,
			  spop.JALAN_OP,
			  spop.BLOK_KAV_NO_OP,
			  sppt.NM_WP_SPPT,
			  sppt.JLN_WP_SPPT,
			  sppt.BLOK_KAV_NO_WP_SPPT,
			  sppt.LUAS_BUMI_SPPT,
			  sppt.LUAS_BNG_SPPT,
			  sppt.THN_PAJAK_SPPT,
			  sppt.TGL_JATUH_TEMPO_SPPT,
			  sppt.PBB_YG_HARUS_DIBAYAR_SPPT,
			  sppt.STATUS_PEMBAYARAN_SPPT,
        pembayaran_sppt.JML_SPPT_YG_DIBAYAR AS TOTAL_BAYAR,
		pembayaran_sppt.TGL_PEMBAYARAN_SPPT
			FROM
			  sppt 
			  LEFT OUTER JOIN pembayaran_sppt 
				ON sppt.KD_PROPINSI = pembayaran_sppt.KD_PROPINSI 
				AND sppt.KD_DATI2 = pembayaran_sppt.KD_DATI2 
				AND sppt.KD_KECAMATAN = pembayaran_sppt.KD_KECAMATAN 
				AND sppt.KD_KELURAHAN = pembayaran_sppt.KD_KELURAHAN 
				AND sppt.KD_BLOK = pembayaran_sppt.KD_BLOK 
				AND sppt.NO_URUT = pembayaran_sppt.NO_URUT 
				AND sppt.KD_JNS_OP = pembayaran_sppt.KD_JNS_OP 
				AND sppt.THN_PAJAK_SPPT = pembayaran_sppt.THN_PAJAK_SPPT 
        AND pembayaran_sppt.TGL_PEMBAYARAN_SPPT <= '$TGL_CUT_OFF'
			  LEFT OUTER JOIN spop 
				ON sppt.KD_PROPINSI = spop.KD_PROPINSI 
				AND sppt.KD_DATI2 = spop.KD_DATI2 
				AND sppt.KD_KECAMATAN = spop.KD_KECAMATAN 
				AND sppt.KD_KELURAHAN = spop.KD_KELURAHAN 
				AND sppt.KD_BLOK = spop.KD_BLOK 
				AND sppt.NO_URUT = spop.NO_URUT 
				AND sppt.KD_JNS_OP = spop.KD_JNS_OP 
			  LEFT OUTER JOIN ref_kecamatan 
				ON sppt.KD_KECAMATAN = ref_kecamatan.KD_KECAMATAN 
			  LEFT OUTER JOIN ref_kelurahan 
				ON sppt.KD_KECAMATAN = ref_kelurahan.KD_KECAMATAN 
				AND sppt.KD_KELURAHAN = ref_kelurahan.KD_KELURAHAN 
				
			WHERE (sppt.KD_PROPINSI = SUBSTRING($NOP, 1, 2)) 
			  AND (sppt.KD_DATI2 = SUBSTRING($NOP, 3, 2)) 
			  AND (sppt.KD_KECAMATAN = SUBSTRING($NOP, 5, 3)) 
			  AND (sppt.KD_KELURAHAN = SUBSTRING($NOP, 8, 3)) 
			  AND (sppt.KD_BLOK = SUBSTRING($NOP, 11, 3)) 
			  AND (sppt.NO_URUT = SUBSTRING($NOP, 14, 4)) 
			  AND (sppt.KD_JNS_OP = SUBSTRING($NOP, 18, 1)) 
			  AND (sppt.THN_PAJAK_SPPT BETWEEN '$TAHUN_AWAL' AND '$TAHUN_AKHIR') 
			ORDER BY sppt.THN_PAJAK_SPPT
        ");
        return $model->queryAll();
    }
	
    public function getNopNow($NOP){
        $connection = Yii::$app->db;
        $model = $connection->createCommand("
			SELECT 
			  sppt.KD_PROPINSI,
			  sppt.KD_DATI2,
			  sppt.KD_KECAMATAN,
			  sppt.KD_KELURAHAN,
			  sppt.KD_BLOK,
			  sppt.NO_URUT,
			  sppt.KD_JNS_OP,
			  ref_kecamatan.NM_KECAMATAN,
			  ref_kelurahan.NM_KELURAHAN,
			  spop.JALAN_OP,
			  spop.BLOK_KAV_NO_OP,
			  sppt.NM_WP_SPPT,
			  sppt.JLN_WP_SPPT,
			  sppt.BLOK_KAV_NO_WP_SPPT,
			  sppt.LUAS_BUMI_SPPT,
			  sppt.LUAS_BNG_SPPT,
			  sppt.THN_PAJAK_SPPT,
			  sppt.PBB_YG_HARUS_DIBAYAR_SPPT,
			  sppt.STATUS_PEMBAYARAN_SPPT,
			  sppt_khusus.JENIS_SPPT
			FROM
			  sppt 
			  LEFT OUTER JOIN sppt_khusus
				ON sppt.KD_PROPINSI = sppt_khusus.KD_PROPINSI 
				AND sppt.KD_DATI2 = sppt_khusus.KD_DATI2 
				AND sppt.KD_KECAMATAN = sppt_khusus.KD_KECAMATAN 
				AND sppt.KD_KELURAHAN = sppt_khusus.KD_KELURAHAN 
				AND sppt.KD_BLOK = sppt_khusus.KD_BLOK 
				AND sppt.NO_URUT = sppt_khusus.NO_URUT 
				AND sppt.KD_JNS_OP = sppt_khusus.KD_JNS_OP 			  
			  LEFT OUTER JOIN pembayaran_sppt 
				ON sppt.KD_PROPINSI = pembayaran_sppt.KD_PROPINSI 
				AND sppt.KD_DATI2 = pembayaran_sppt.KD_DATI2 
				AND sppt.KD_KECAMATAN = pembayaran_sppt.KD_KECAMATAN 
				AND sppt.KD_KELURAHAN = pembayaran_sppt.KD_KELURAHAN 
				AND sppt.KD_BLOK = pembayaran_sppt.KD_BLOK 
				AND sppt.NO_URUT = pembayaran_sppt.NO_URUT 
				AND sppt.KD_JNS_OP = pembayaran_sppt.KD_JNS_OP 
				AND sppt.THN_PAJAK_SPPT = pembayaran_sppt.THN_PAJAK_SPPT 
			  LEFT OUTER JOIN spop 
				ON sppt.KD_PROPINSI = spop.KD_PROPINSI 
				AND sppt.KD_DATI2 = spop.KD_DATI2 
				AND sppt.KD_KECAMATAN = spop.KD_KECAMATAN 
				AND sppt.KD_KELURAHAN = spop.KD_KELURAHAN 
				AND sppt.KD_BLOK = spop.KD_BLOK 
				AND sppt.NO_URUT = spop.NO_URUT 
				AND sppt.KD_JNS_OP = spop.KD_JNS_OP 
			  LEFT OUTER JOIN ref_kecamatan 
				ON sppt.KD_KECAMATAN = ref_kecamatan.KD_KECAMATAN 
			  LEFT OUTER JOIN ref_kelurahan 
				ON sppt.KD_KECAMATAN = ref_kelurahan.KD_KECAMATAN 
				AND sppt.KD_KELURAHAN = ref_kelurahan.KD_KELURAHAN 
			WHERE (sppt.KD_PROPINSI = SUBSTRING($NOP, 1, 2)) 
			  AND (sppt.KD_DATI2 = SUBSTRING($NOP, 3, 2)) 
			  AND (sppt.KD_KECAMATAN = SUBSTRING($NOP, 5, 3)) 
			  AND (sppt.KD_KELURAHAN = SUBSTRING($NOP, 8, 3)) 
			  AND (sppt.KD_BLOK = SUBSTRING($NOP, 11, 3)) 
			  AND (sppt.NO_URUT = SUBSTRING($NOP, 14, 4)) 
			  AND (sppt.KD_JNS_OP = SUBSTRING($NOP, 18, 1)) 
			  AND ( (sppt.THN_PAJAK_SPPT = YEAR(NOW())) OR (sppt.THN_PAJAK_SPPT = YEAR(NOW())-1) )
        ");
        return $model->queryAll();
    }	
	
}
