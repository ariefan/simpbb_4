<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Dbkb extends Model
{
    public function getDbkbStandard($TAHUN){
    	$connection = Yii::$app->db;
    	$q = "select
				*
			  from dbkb_standard left join 
			  ref_jpb using(KD_JPB) left join 
			  tipe_bangunan using(TIPE_BNG) left join
			  bangunan_lantai using(KD_JPB,TIPE_BNG,KD_BNG_LANTAI)
			  WHERE THN_DBKB_STANDARD = '$TAHUN'";
		$command = $connection->createCommand($q);
		return $command->queryAll();
    }

    public function getFasBintang($TAHUN){
    	$connection = Yii::$app->db;
    	$q = "SELECT
				KD_PROPINSI,KD_DATI2,THN_DEP_JPB_KLS_BINTANG,KD_FASILITAS,KD_JPB,
				NM_FASILITAS,
				IFNULL(t1.NILAI_FASILITAS_KLS_BINTANG,0) k1,
				IFNULL(t2.NILAI_FASILITAS_KLS_BINTANG,0) k2,
				IFNULL(t3.NILAI_FASILITAS_KLS_BINTANG,0) k3,
				IFNULL(t4.NILAI_FASILITAS_KLS_BINTANG,0) k4,
				IFNULL(t5.NILAI_FASILITAS_KLS_BINTANG,0) k5
				FROM
				(select * from fas_dep_jpb_kls_bintang
				where kls_bintang='1') t1
				LEFT JOIN 
				(select * from fas_dep_jpb_kls_bintang
				where kls_bintang='2') t2 USING(KD_PROPINSI,KD_DATI2,THN_DEP_JPB_KLS_BINTANG,KD_FASILITAS,KD_JPB)
				LEFT JOIN 
				(select * from fas_dep_jpb_kls_bintang
				where kls_bintang='3') t3 USING(KD_PROPINSI,KD_DATI2,THN_DEP_JPB_KLS_BINTANG,KD_FASILITAS,KD_JPB)
				LEFT JOIN 
				(select * from fas_dep_jpb_kls_bintang
				where kls_bintang='4') t4 USING(KD_PROPINSI,KD_DATI2,THN_DEP_JPB_KLS_BINTANG,KD_FASILITAS,KD_JPB)
				LEFT JOIN 
				(select * from fas_dep_jpb_kls_bintang
				where kls_bintang='5') t5 USING(KD_PROPINSI,KD_DATI2,THN_DEP_JPB_KLS_BINTANG,KD_FASILITAS,KD_JPB)
				join fasilitas using(kd_fasilitas)
				WHERE
				thn_dep_jpb_kls_bintang='$TAHUN'";
		$command = $connection->createCommand($q);
		return $command->queryAll();

    }

    public function getFasilitas($TAHUN){
    	$connection = Yii::$app->db;

    	$q = "SELECT * FROM fas_dep_min_max left join 
				fasilitas using(kd_fasilitas) 
				where thn_dep_min_max='$TAHUN'";
		$command = $connection->createCommand($q);
		return $command->queryAll();
		
    }

    public function getQueryLaporanDbkb($TAHUN,$KODE){
    	if($KODE==='1.1'){
    		$sql = $this->getDbkbStandardLaporan(1,$TAHUN);
    	} elseif($KODE==='1.2') {
    		$sql =  $this->getDbkbStandardLaporan(2,$TAHUN);	
    	} elseif ($KODE==='1.3') {
    		$sql =  $this->getDbkbStandardLaporan(5,$TAHUN);	    		
    	} elseif ($KODE==='1.4') {
    		$sql =  "SELECT 
    				  'Bengkel/Gudang/Pertanian' AS NAMA,
					  LBR_BENT_MIN_DBKB_JPB8 AS L_MIN,
					  LBR_BENT_MAX_DBKB_JPB8 AS L_MAX,
					  TING_KOLOM_MIN_DBKB_JPB8 AS T_MIN,
					  TING_KOLOM_MAX_DBKB_JPB8 AS T_MAX,
					  NILAI_DBKB_JPB8 AS NILAI 
					FROM
					  dbkb_jpb8 
					WHERE THN_DBKB_JPB8 = $TAHUN  
					ORDER BY TING_KOLOM_MIN_DBKB_JPB8,
					  NILAI_DBKB_JPB8";
    	} elseif ($KODE==='1.5') {
    		$sql = "SELECT 
    				  'Pabrik' AS NAMA,
					  LBR_BENT_MIN_DBKB_JPB3 AS L_MIN,
					  LBR_BENT_MAX_DBKB_JPB3 AS L_MAX,
					  TING_KOLOM_MIN_DBKB_JPB3 AS T_MIN,
					  TING_KOLOM_MAX_DBKB_JPB3 AS T_MAX,
					  NILAI_DBKB_JPB3 AS NILAI 
					FROM
					  dbkb_jpb3 
					WHERE THN_DBKB_JPB3 = $TAHUN  
					ORDER BY TING_KOLOM_MIN_DBKB_JPB3,
					  NILAI_DBKB_JPB3";
    	} elseif ($KODE==='1.6') {
    		$sql = "SELECT 
					  LANTAI_MIN_JPB2 AS MIN_LT,
					  LANTAI_MAX_JPB2 AS MAX_LT,
					  GROUP_CONCAT(KLS_DBKB_JPB2) AS KELAS,
					  GROUP_CONCAT(NILAI_DBKB_JPB2) AS NILAI
					FROM
					  dbkb_jpb2 
					WHERE THN_DBKB_JPB2 = $TAHUN 
					GROUP BY LANTAI_MIN_JPB2,
					  LANTAI_MAX_JPB2 
					ORDER BY LANTAI_MIN_JPB2,
					  KLS_DBKB_JPB2 	";
    	} elseif ($KODE==='1.7') {
    		$sql = "SELECT 
					  LANTAI_MIN_JPB4 AS MIN_LT,
					  LANTAI_MAX_JPB4 AS MAX_LT,
					  GROUP_CONCAT(KLS_DBKB_JPB4) AS KELAS,
					  GROUP_CONCAT(NILAI_DBKB_JPB4) AS NILAI
					FROM
					  dbkb_jpb4 
					WHERE THN_DBKB_JPB4 = $TAHUN 
					GROUP BY LANTAI_MIN_JPB4,
					  LANTAI_MAX_JPB4
					ORDER BY LANTAI_MIN_JPB4,
					  KLS_DBKB_JPB4";
    	} elseif ($KODE==='1.8') {
    		$sql = "SELECT 
					  LANTAI_MIN_JPB5 AS MIN_LT,
					  LANTAI_MAX_JPB5 AS MAX_LT,
					  GROUP_CONCAT(KLS_DBKB_JPB5) AS KELAS,
					  GROUP_CONCAT(NILAI_DBKB_JPB5) AS NILAI 
					FROM
					  dbkb_JPB5 
					WHERE THN_DBKB_JPB5 = $TAHUN  
					GROUP BY LANTAI_MIN_JPB5,
					  LANTAI_MAX_JPB5 
					ORDER BY LANTAI_MIN_JPB5,
					  KLS_DBKB_JPB5 ";
    	} elseif ($KODE==='1.9') {
    		$sql = "SELECT 
					  '' AS MIN_LT,
					  '' AS MAX_LT,
					  GROUP_CONCAT(KLS_DBKB_JPB6) AS KELAS,
					  GROUP_CONCAT(NILAI_DBKB_JPB6) AS NILAI 
					FROM
					  dbkb_JPB6 
					WHERE THN_DBKB_JPB6 = $TAHUN ";
    	} elseif ($KODE==='1.10') {
    		$sql = "SELECT 
					  LANTAI_MIN_JPB7 AS MIN_LT,
					  LANTAI_MAX_JPB7 AS MAX_LT,
					  GROUP_CONCAT(BINTANG_DBKB_JPB7 ORDER BY BINTANG_DBKB_JPB7) AS KELAS,
					  GROUP_CONCAT(NILAI_DBKB_JPB7 ORDER BY NILAI_DBKB_JPB7) AS NILAI 
					FROM
					  dbkb_JPB7 
					WHERE THN_DBKB_JPB7 = $TAHUN AND JNS_DBKB_JPB7=1
					GROUP BY LANTAI_MIN_JPB7,
					  LANTAI_MAX_JPB7 
					ORDER BY LANTAI_MIN_JPB7,
					  BINTANG_DBKB_JPB7 ";
    	} elseif ($KODE==='1.11') {
    		$sql = "SELECT 
					  LANTAI_MIN_JPB7 AS MIN_LT,
					  LANTAI_MAX_JPB7 AS MAX_LT,
					  GROUP_CONCAT(BINTANG_DBKB_JPB7 ORDER BY BINTANG_DBKB_JPB7) AS KELAS,
					  GROUP_CONCAT(NILAI_DBKB_JPB7 ORDER BY NILAI_DBKB_JPB7) AS NILAI 
					FROM
					  dbkb_JPB7 
					WHERE THN_DBKB_JPB7 = $TAHUN AND JNS_DBKB_JPB7=2
					GROUP BY LANTAI_MIN_JPB7,
					  LANTAI_MAX_JPB7 
					ORDER BY LANTAI_MIN_JPB7,
					  BINTANG_DBKB_JPB7 ";
    	} elseif ($KODE==='1.12') {
    		$sql = "SELECT 
					  '' AS MIN_LT,
					  '' AS MAX_LT,
					  GROUP_CONCAT(TYPE_DBKB_JPB12 ORDER BY TYPE_DBKB_JPB12) AS KELAS,
					  GROUP_CONCAT(NILAI_DBKB_JPB12 ORDER BY NILAI_DBKB_JPB12) AS NILAI 
					FROM
					  dbkb_jpb12 
					WHERE THN_DBKB_JPB12 = $TAHUN ";
    	} elseif ($KODE==='1.13') {
    		$sql = "SELECT 
					  LANTAI_MIN_JPB13 AS MIN_LT,
					  LANTAI_MAX_JPB13 AS MAX_LT,
					  GROUP_CONCAT(KLS_DBKB_JPB13) AS KELAS,
					  GROUP_CONCAT(NILAI_DBKB_JPB13) AS NILAI 
					FROM
					  dbkb_JPB13 
					WHERE THN_DBKB_JPB13 = $TAHUN
					GROUP BY LANTAI_MIN_JPB13,
					  LANTAI_MAX_JPB13 
					ORDER BY LANTAI_MIN_JPB13,
					  KLS_DBKB_JPB13";
    	} elseif ($KODE==='1.14') {
    		$sql = "SELECT 
					  LANTAI_MIN_JPB16 AS MIN_LT,
					  LANTAI_MAX_JPB16 AS MAX_LT,
					  GROUP_CONCAT(KLS_DBKB_JPB16) AS KELAS,
					  GROUP_CONCAT(NILAI_DBKB_JPB16) AS NILAI 
					FROM
					  dbkb_JPB16 
					WHERE THN_DBKB_JPB16 = $TAHUN
					GROUP BY LANTAI_MIN_JPB16,
					  LANTAI_MAX_JPB16 
					ORDER BY LANTAI_MIN_JPB16,
					  KLS_DBKB_JPB16";
    	} elseif ($KODE==='1.15') {
    		$sql = "SELECT '' AS MIN_LT, '' AS MAX_LT,
					  NILAI_DBKB_MEZANIN AS NILAI 
					FROM
					  dbkb_mezanin 
					WHERE THN_DBKB_MEZANIN = $TAHUN";
    	} elseif ($KODE==='1.17') {
    		$sql = "SELECT 
					  CASE TYPE_KONSTRUKSI
					  WHEN 1 THEN 'A. Ringan'
					  WHEN 2 THEN 'B. Sedang'
					  WHEN 3 THEN 'C. Menengah'
					  WHEN 4 THEN 'D. Berat'
					  WHEN 5 THEN 'E. Sangat Berat' END AS TIPE,
					  CASE TYPE_KONSTRUKSI
					  WHEN 1 THEN 1 
					  WHEN 2 THEN 601
					  WHEN 3 THEN 1201 
					  WHEN 4 THEN 2401
					  WHEN 5 THEN 5000 END AS MIN_KAP,
					  CASE TYPE_KONSTRUKSI
					  WHEN 1 THEN 600
					  WHEN 2 THEN 1200
					  WHEN 3 THEN 2400 
					  WHEN 4 THEN 5000
					  WHEN 5 THEN '-' END AS MAX_KAP,
					    NILAI_DBKB_DAYA_DUKUNG AS NILAI 
					FROM
					  dbkb_daya_dukung 
					WHERE THN_DBKB_DAYA_DUKUNG = $TAHUN 
					ORDER BY tipe ";
    	} elseif ($KODE==='1.18') {
    		$sql = "SELECT 
    				  '' AS TIPE,
					  ROUND(KAPASITAS_MIN_DBKB_JPB15) MIN_KAP,
					  ROUND(KAPASITAS_MAX_DBKB_JPB15) MAX_KAP,
					  NILAI_DBKB_JPB15 AS NILAI
					FROM
					  dbkb_jpb15 
					WHERE THN_DBKB_JPB15 = $TAHUN 
					  AND JNS_TANGKI_DBKB_JPB15 = 2 
					ORDER BY NILAI_DBKB_JPB15 ";
    	} elseif ($KODE==='1.19') {
    		$sql = "SELECT 
    				  '' AS TIPE,
					  ROUND(KAPASITAS_MIN_DBKB_JPB15) MIN_KAP,
					  ROUND(KAPASITAS_MAX_DBKB_JPB15) MAX_KAP,
					  NILAI_DBKB_JPB15 AS NILAI
					FROM
					  dbkb_jpb15 
					WHERE THN_DBKB_JPB15 = $TAHUN 
					  AND JNS_TANGKI_DBKB_JPB15 = 1 
					ORDER BY NILAI_DBKB_JPB15 ";
    	} elseif ($KODE==='2.1') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NAMA,
					  1 AS KELAS,
					  NILAI_NON_DEP AS NILAI,
					  KD_FASILITAS,
					  1 AS O 
					FROM
					  fasilitas 
					  JOIN fas_non_dep USING (KD_FASILITAS) 
					WHERE THN_NON_DEP = $TAHUN 
					  AND NM_FASILITAS LIKE \"AC%\" 
					UNION
					SELECT 
					  NM_FASILITAS AS NAMA,
					  GROUP_CONCAT(KLS_BINTANG) AS KELAS,
					  GROUP_CONCAT(
					    ROUND(NILAI_FASILITAS_KLS_BINTANG)
					  ) AS NILAI,
					  KD_FASILITAS,
					  2 AS O 
					FROM
					  fasilitas 
					  JOIN fas_dep_jpb_kls_bintang USING (KD_FASILITAS) 
					WHERE THN_DEP_JPB_KLS_BINTANG = $TAHUN 
					  AND NM_FASILITAS LIKE \"AC%\" 
					GROUP BY NM_FASILITAS 
					ORDER BY O,
					  KD_FASILITAS ";
    	} elseif ($KODE==='2.2') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NAMA,
					  GROUP_CONCAT(KLS_BINTANG) AS KELAS,
					  GROUP_CONCAT(
					    ROUND(NILAI_FASILITAS_KLS_BINTANG)
					  ) AS NILAI 
					FROM
					  fasilitas 
					  JOIN fas_dep_jpb_kls_bintang USING (KD_FASILITAS) 
					WHERE THN_DEP_JPB_KLS_BINTANG = $TAHUN 
					  AND NM_FASILITAS LIKE \"%BOILER%\" 
					GROUP BY NAMA 
					ORDER BY KD_FASILITAS";
    	} elseif ($KODE==='2.3') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  KLS_DEP_MIN AS MIN_DEP,
					  KLS_DEP_MAX AS MAX_DEP,
					  NILAI_DEP_MIN_MAX AS NILAI
					FROM
					  fasilitas 
					  JOIN fas_dep_min_max USING (KD_FASILITAS) 
					WHERE THN_DEP_MIN_MAX = $TAHUN  
					  AND NM_FASILITAS LIKE \"%RENANG%\" 
					ORDER BY KD_FASILITAS,
					  KLS_DEP_MIN ";
    	} elseif ($KODE==='2.4') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  NILAI_NON_DEP AS NILAI
					FROM
					  fasilitas 
					  JOIN fas_non_dep USING (KD_FASILITAS) 
					WHERE THN_NON_DEP = $TAHUN  
					  AND NM_FASILITAS LIKE \"%PERKERASAN%\" 
					ORDER BY KD_FASILITAS ";
    	} elseif ($KODE==='2.5') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  NILAI_NON_DEP AS NILAI
					FROM
					  fasilitas 
					  JOIN fas_non_dep USING (KD_FASILITAS) 
					WHERE THN_NON_DEP = $TAHUN  
					  AND NM_FASILITAS LIKE \"%TENIS%\" 
					ORDER BY KD_FASILITAS ";
    	} elseif ($KODE==='2.6') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  KLS_DEP_MIN AS MIN_LT,
					  KLS_DEP_MAX AS MAX_LT,
					  NILAI_DEP_MIN_MAX AS NILAI 
					FROM
					  fasilitas 
					  JOIN fas_dep_min_max USING (KD_FASILITAS) 
					WHERE THN_DEP_MIN_MAX = 2016 
					  AND NM_FASILITAS LIKE \"%LIFT%\" 
					ORDER BY KD_FASILITAS,
					  KLS_DEP_MIN ";
    	} elseif ($KODE==='2.7') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  NILAI_NON_DEP AS NILAI
					FROM
					  fasilitas 
					  JOIN fas_non_dep USING (KD_FASILITAS) 
					WHERE THN_NON_DEP = $TAHUN  
					  AND NM_FASILITAS LIKE \"%TANGGA%\" 
					ORDER BY KD_FASILITAS ";
    	} elseif ($KODE==='2.8') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  NILAI_NON_DEP AS NILAI
					FROM
					  fasilitas 
					  JOIN fas_non_dep USING (KD_FASILITAS) 
					WHERE THN_NON_DEP = $TAHUN  
					  AND NM_FASILITAS LIKE \"%PAGAR%\" 
					ORDER BY KD_FASILITAS ";
    	} elseif ($KODE==='2.9') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  NILAI_NON_DEP AS NILAI
					FROM
					  fasilitas 
					  JOIN fas_non_dep USING (KD_FASILITAS) 
					WHERE THN_NON_DEP = $TAHUN  
					  AND NM_FASILITAS LIKE \"PROTEKSI API%\" 
					ORDER BY KD_FASILITAS ";
    	} elseif ($KODE==='2.10') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  NILAI_NON_DEP AS NILAI
					FROM
					  fasilitas 
					  JOIN fas_non_dep USING (KD_FASILITAS) 
					WHERE THN_NON_DEP = $TAHUN  
					  AND NM_FASILITAS LIKE \"%SALURAN%\" 
					ORDER BY KD_FASILITAS ";
    	} elseif ($KODE==='2.11') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  NILAI_NON_DEP AS NILAI
					FROM
					  fasilitas 
					  JOIN fas_non_dep USING (KD_FASILITAS) 
					WHERE THN_NON_DEP = $TAHUN  
					  AND NM_FASILITAS LIKE \"%SUMUR%\" 
					ORDER BY KD_FASILITAS ";
    	} elseif ($KODE==='2.12') {
    		$sql = "SELECT 
					  NM_FASILITAS AS NM,
					  NILAI_NON_DEP AS NILAI
					FROM
					  fasilitas 
					  JOIN fas_non_dep USING (KD_FASILITAS) 
					WHERE THN_NON_DEP = $TAHUN  
					  AND NM_FASILITAS LIKE \"%LISTRIK%\" 
					ORDER BY KD_FASILITAS ";
    	} elseif ($KODE==='3.1') {
    		$sql = "SELECT 
					  NM_PEKERJAAN,NM_KEGIATAN,NILAI_DBKB_MATERIAL AS NILAI
					FROM
					  dbkb_material 
					  JOIN pekerjaan USING (KD_PEKERJAAN) 
					  JOIN pekerjaan_kegiatan USING (KD_PEKERJAAN,KD_KEGIATAN)
					WHERE THN_DBKB_MATERIAL = $TAHUN AND NM_PEKERJAAN='ATAP'
					ORDER BY KD_PEKERJAAN,NM_KEGIATAN";
    	} elseif ($KODE==='3.2') {
    		$sql = "SELECT 
					  NM_PEKERJAAN,NM_KEGIATAN,NILAI_DBKB_MATERIAL AS NILAI
					FROM
					  dbkb_material 
					  JOIN pekerjaan USING (KD_PEKERJAAN) 
					  JOIN pekerjaan_kegiatan USING (KD_PEKERJAAN,KD_KEGIATAN)
					WHERE THN_DBKB_MATERIAL = $TAHUN AND NM_PEKERJAAN='DINDING'
					ORDER BY KD_PEKERJAAN,NM_KEGIATAN";
    	} elseif ($KODE==='3.3') {
    		$sql = "SELECT 
					  NM_PEKERJAAN,NM_KEGIATAN,NILAI_DBKB_MATERIAL AS NILAI
					FROM
					  dbkb_material 
					  JOIN pekerjaan USING (KD_PEKERJAAN) 
					  JOIN pekerjaan_kegiatan USING (KD_PEKERJAAN,KD_KEGIATAN)
					WHERE THN_DBKB_MATERIAL = $TAHUN AND NM_PEKERJAAN='LANTAI'
					ORDER BY KD_PEKERJAAN,NM_KEGIATAN";
    	} elseif ($KODE==='3.4') {
    		$sql = "SELECT 
					  NM_PEKERJAAN,NM_KEGIATAN,NILAI_DBKB_MATERIAL AS NILAI
					FROM
					  dbkb_material 
					  JOIN pekerjaan USING (KD_PEKERJAAN) 
					  JOIN pekerjaan_kegiatan USING (KD_PEKERJAAN,KD_KEGIATAN)
					WHERE THN_DBKB_MATERIAL = $TAHUN AND NM_PEKERJAAN='LANGIT LANGIT'
					ORDER BY KD_PEKERJAAN,NM_KEGIATAN";
    	}

    	$connection = Yii::$app->db;
    	$command = $connection->createCommand($sql);
		return $command->queryAll();
    }

    public function getDbkbStandardLaporan($KODE,$TAHUN)
    {
    	return "SELECT 
				  NM_TIPE_BNG AS NAMA,
				  LUAS_MIN_TIPE_BNG AS L_MIN,
				  LUAS_MAX_TIPE_BNG AS L_MAX,
				  IF(SUBSTR(KD_BNG_LANTAI, 3, 1)='1','1','2') AS T_MIN,
				  IF(SUBSTR(KD_BNG_LANTAI, 3, 1)='1','1','4') AS T_MAX,
				  NILAI_DBKB_STANDARD AS NILAI
				FROM
				  dbkb_standard 
				  JOIN tipe_bangunan USING (TIPE_BNG) 
				WHERE THN_DBKB_STANDARD = $TAHUN 
				  AND SUBSTR(KD_BNG_LANTAI, 1, 1) = '$KODE' 
				ORDER BY SUBSTR(KD_BNG_LANTAI, 3, 1),
				  LUAS_MIN_TIPE_BNG,
				  LUAS_MAX_TIPE_BNG,
				  KD_BNG_LANTAI,
				  NILAI_DBKB_STANDARD";
    }

    public function shapeArray($data)
    {
    	$d = [];
    	foreach ($data as $key => $value) {
    		$kls = explode(',', $value['KELAS']);
    		$nilai = explode(',', $value['NILAI']);
    		foreach ($kls as $k=>$v) {
    			$data[$key]['KOL_'.$v] = $nilai[$k];
    		}
    	}
    	return $data;
    }
    
}

