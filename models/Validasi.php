<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "validasi".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $KETERANGAN
 * @property integer $IS_CETAK
 * @property integer $IS_VALIDATED
 * @property string $KELOMPOK
 * @property string $MODIFIED
 */
class Validasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'validasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KETERANGAN','NM_WP_SPPT','JENIS','TINDAK_LANJUT'], 'string'],
            [['IS_CETAK', 'IS_VALIDATED','VALIDASI_KE','PBB','KATEGORI'], 'integer'],
            [['MODIFIED'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['KELOMPOK'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KD_PROPINSI' => 'PR',
            'KD_DATI2' => 'DT',
            'KD_KECAMATAN' => 'KECAMATAN',
            'KD_KELURAHAN' => 'KELURAHAN',
            'KD_BLOK' => 'BLOK',
            'NO_URUT' => 'NO URUT',
            'KD_JNS_OP' => 'KD',
            'KETERANGAN' => 'Keterangan',
            'IS_CETAK' => 'Is  Cetak',
            'IS_VALIDATED' => 'Is  Validated',
            'KELOMPOK' => 'Kelompok',
            'JENIS' => 'Jenis',
            'MODIFIED' => 'Modified',
        ];
    }

    public function getLaporan($p){
        $kec = $p['Validasi']['KD_KECAMATAN'];
        $kel = $p['Validasi']['KD_KELURAHAN'];
        $thn_min = $p['THN_MIN'];
        $thn_max = $p['THN_MAX'];
        $pbb_min = $p['PBB_MIN'];
        $pbb_max = $p['PBB_MAX'];
        $kondisi = '';
        $kondisi .= !empty($kel) ? " AND sppt.KD_KELURAHAN='".$kel."'" : '';
        $kondisi .= !empty($p['Validasi']['KD_BLOK']) ? " AND sppt.KD_BLOK='".$p['Validasi']['KD_BLOK']."'" : '';
        $kondisi .= !empty($p['Validasi']['VALIDASI_KE']) ? " AND VALIDASI_KE='".$p['Validasi']['VALIDASI_KE']."'" : '';
        $kondisi .= !empty($p['Validasi']['IS_CETAK']) ? " AND IS_CETAK='".$p['Validasi']['IS_CETAK']."'" : '';
        $kondisi .= !empty($p['Validasi']['IS_VALIDATED']) ? " AND IS_VALIDATED=".$p['Validasi']['IS_VALIDATED'] : '';
        $kondisi .= !empty($p['Validasi']['KELOMPOK']) ? " AND KELOMPOK='".$p['Validasi']['KELOMPOK']."'" : '';
        $kondisi .= !empty($p['Validasi']['KATEGORI']) ? " AND KATEGORI='".$p['Validasi']['KATEGORI']."'" : '';
        $kondisi .= !empty($p['Validasi']['JENIS']) ? " AND JENIS='".$p['Validasi']['JENIS']."'" : '';
        //$kondisi .= !empty($p['status_pembayaran_sppt']) ? " AND status_pembayaran_sppt='".str_replace('nol','0',$p['status_pembayaran_sppt'])."'" : '';
        if(str_replace('nol','0',$p['status_pembayaran_sppt']) == '1'){
          $kondisi .= " AND IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0) - PBB_YG_HARUS_DIBAYAR_SPPT > 0";
        }else if(str_replace('nol','0',$p['status_pembayaran_sppt']) == '0'){
          $kondisi .= " AND PBB_YG_HARUS_DIBAYAR_SPPT - IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0) > 0";
        }
        $sql = "SELECT 
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
                        '.',
                        sppt.NO_URUT,
                        '.',
                        sppt.KD_JNS_OP
                      ) AS NOP,
                      sppt.NM_WP_SPPT AS NAMA,
                      sppt.`THN_PAJAK_SPPT` AS TAHUN,
                      sppt.`JLN_WP_SPPT` AS ALAMAT_WP,
                      spop.`JALAN_OP` AS ALAMAT_OP,
                      kategori_nama AS KATEGORI,
                      sppt.`PBB_YG_HARUS_DIBAYAR_SPPT` AS PBB,
                      -- sppt.`STATUS_PEMBAYARAN_SPPT` AS STATUS_BAYAR,
                      IF(STATUS_PEMBAYARAN_SPPT=0, PBB_YG_HARUS_DIBAYAR_SPPT, 0) AS PIUTANG,
					  IF(PBB_YG_HARUS_DIBAYAR_SPPT - IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0) > 0, PBB_YG_HARUS_DIBAYAR_SPPT - IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0), 0) KURANG_BAYAR,
					  IF(IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0) - PBB_YG_HARUS_DIBAYAR_SPPT > 0, IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0) - PBB_YG_HARUS_DIBAYAR_SPPT, 0) LEBIH_BAYAR,
                      TINDAK_LANJUT,
                      IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0) AS POKOK_BAYAR,
                      TGL_PEMBAYARAN_SPPT AS TANGGAL_BAYAR
                FROM validasi
                JOIN spop USING (KD_PROPINSI,KD_DATI2,KD_KECAMATAN,KD_KELURAHAN,KD_BLOK,NO_URUT,KD_JNS_OP) 
                JOIN sppt USING (KD_PROPINSI,KD_DATI2,KD_KECAMATAN,KD_KELURAHAN,KD_BLOK,NO_URUT,KD_JNS_OP) 
                LEFT JOIN pembayaran_sppt 
                    ON sppt.KD_PROPINSI = pembayaran_sppt.KD_PROPINSI AND 
                       sppt.KD_DATI2 = pembayaran_sppt.KD_DATI2 AND
                       sppt.KD_KECAMATAN = pembayaran_sppt.KD_KECAMATAN AND
                       sppt.KD_KELURAHAN = pembayaran_sppt.KD_KELURAHAN AND
                       sppt.KD_BLOK = pembayaran_sppt.KD_BLOK AND
                       sppt.NO_URUT = pembayaran_sppt.NO_URUT AND 
                       sppt.KD_JNS_OP = pembayaran_sppt.KD_JNS_OP AND
                       sppt.THN_PAJAK_SPPT = pembayaran_sppt.THN_PAJAK_SPPT AND
                       pembayaran_sppt.TGL_PEMBAYARAN_SPPT < '".$p['cut_off']."'
                LEFT JOIN validasi_kategori ON KATEGORI = kategori_id
                WHERE sppt.KD_KECAMATAN='$kec' 
                $kondisi
                AND PBB BETWEEN $pbb_min AND $pbb_max
                AND sppt.THN_PAJAK_SPPT BETWEEN $thn_min AND $thn_max
                GROUP BY sppt.KD_PROPINSI, sppt.KD_DATI2, sppt.KD_KECAMATAN, sppt.KD_KELURAHAN, sppt.KD_BLOK, sppt.NO_URUT, sppt.KD_JNS_OP, sppt.THN_PAJAK_SPPT
                ORDER BY sppt.KD_PROPINSI, sppt.KD_DATI2, sppt.KD_KECAMATAN, sppt.KD_KELURAHAN, sppt.KD_BLOK, sppt.NO_URUT, sppt.KD_JNS_OP, sppt.THN_PAJAK_SPPT
                ";
//echo $sql;exit;
        $connection = Yii::$app->db;
        $model = $connection->createCommand($sql);
        return $model->queryAll();
    }

    public function getLaporanPerNop($p){
        $kec = $p['Validasi']['KD_KECAMATAN'];
        $kel = $p['Validasi']['KD_KELURAHAN'];
        $thn_min = $p['THN_MIN'];
        $thn_max = $p['THN_MAX'];
        $pbb_min = $p['PBB_MIN'];
        $pbb_max = $p['PBB_MAX'];
        $kondisi = '';
        $kondisi .= !empty($kel) ? " AND sppt.KD_KELURAHAN='".$kel."'" : '';
        $kondisi .= !empty($p['Validasi']['KD_BLOK']) ? " AND sppt.KD_BLOK='".$p['Validasi']['KD_BLOK']."'" : '';
        $kondisi .= !empty($p['Validasi']['VALIDASI_KE']) ? " AND VALIDASI_KE='".$p['Validasi']['VALIDASI_KE']."'" : '';
        $kondisi .= !empty($p['Validasi']['IS_CETAK']) ? " AND IS_CETAK='".$p['Validasi']['IS_CETAK']."'" : '';
        $kondisi .= !empty($p['Validasi']['IS_VALIDATED']) ? " AND IS_VALIDATED=".$p['Validasi']['IS_VALIDATED'] : '';
        $kondisi .= !empty($p['Validasi']['KELOMPOK']) ? " AND KELOMPOK='".$p['Validasi']['KELOMPOK']."'" : '';
        $kondisi .= !empty($p['Validasi']['KATEGORI']) ? " AND KATEGORI='".$p['Validasi']['KATEGORI']."'" : '';
        $kondisi .= !empty($p['Validasi']['JENIS']) ? " AND JENIS='".$p['Validasi']['JENIS']."'" : '';
        //$kondisi .= !empty($p['status_pembayaran_sppt']) ? " AND status_pembayaran_sppt='".$p['status_pembayaran_sppt']."'" : '';
        if(str_replace('nol','0',$p['status_pembayaran_sppt']) == '1'){
          $kondisi .= " AND IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0) - PBB_YG_HARUS_DIBAYAR_SPPT > 0";
        }else if(str_replace('nol','0',$p['status_pembayaran_sppt']) == '0'){
          $kondisi .= " AND PBB_YG_HARUS_DIBAYAR_SPPT - IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0) > 0";
        }

        $sql = "SELECT 
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
                        '.',
                        sppt.NO_URUT,
                        '.',
                        sppt.KD_JNS_OP
                      ) AS NOP,
                      sppt.NM_WP_SPPT AS NAMA,
                      sppt.`JLN_WP_SPPT` AS ALAMAT_WP,
                      spop.`JALAN_OP` AS ALAMAT_OP,
                      kategori_nama AS KATEGORI,
                      sum(sppt.`PBB_YG_HARUS_DIBAYAR_SPPT`) AS PBB,
                      TINDAK_LANJUT,
                      SUM(IFNULL(pembayaran_sppt.JML_SPPT_YG_DIBAYAR,0) - IFNULL(pembayaran_sppt.DENDA_SPPT,0)) AS POKOK_BAYAR
                FROM validasi
                JOIN spop USING (KD_PROPINSI,KD_DATI2,KD_KECAMATAN,KD_KELURAHAN,KD_BLOK,NO_URUT,KD_JNS_OP) 
                JOIN sppt USING (KD_PROPINSI,KD_DATI2,KD_KECAMATAN,KD_KELURAHAN,KD_BLOK,NO_URUT,KD_JNS_OP) 
                LEFT JOIN pembayaran_sppt 
                    ON sppt.KD_PROPINSI = pembayaran_sppt.KD_PROPINSI AND 
                       sppt.KD_DATI2 = pembayaran_sppt.KD_DATI2 AND
                       sppt.KD_KECAMATAN = pembayaran_sppt.KD_KECAMATAN AND
                       sppt.KD_KELURAHAN = pembayaran_sppt.KD_KELURAHAN AND
                       sppt.KD_BLOK = pembayaran_sppt.KD_BLOK AND
                       sppt.NO_URUT = pembayaran_sppt.NO_URUT AND 
                       sppt.KD_JNS_OP = pembayaran_sppt.KD_JNS_OP AND
                       sppt.THN_PAJAK_SPPT = pembayaran_sppt.THN_PAJAK_SPPT AND
                       pembayaran_sppt.TGL_PEMBAYARAN_SPPT < '".$p['cut_off']."'
                LEFT JOIN validasi_kategori ON KATEGORI = kategori_id
                WHERE sppt.KD_KECAMATAN='$kec' 
                $kondisi
                AND PBB BETWEEN $pbb_min AND $pbb_max
                AND sppt.THN_PAJAK_SPPT BETWEEN $thn_min AND $thn_max
                GROUP BY sppt.KD_PROPINSI, sppt.KD_DATI2, sppt.KD_KECAMATAN, sppt.KD_KELURAHAN, sppt.KD_BLOK, sppt.NO_URUT, sppt.KD_JNS_OP
                ORDER BY sppt.KD_PROPINSI, sppt.KD_DATI2, sppt.KD_KECAMATAN, sppt.KD_KELURAHAN, sppt.KD_BLOK, sppt.NO_URUT, sppt.KD_JNS_OP
                ";
// echo $sql;exit;
        $connection = Yii::$app->db;
        $model = $connection->createCommand($sql);
        return $model->queryAll();
    }

}
