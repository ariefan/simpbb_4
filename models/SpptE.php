<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sppt_e".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property string|null $EMAIL
 * @property string|null $NM_WP_SPPT
 * @property string|null $TGL_PEMBAYARAN_TERAKHIR
 * @property string|null $TGL_DIBUAT
 * @property string|null $TGL_EMAIL
 * @property string|null $TGL_RECORD
 * @property string|null $TGL_VERIFIKASI_1
 * @property string|null $TGL_VERIFIKASI_2
 * @property string|null $TGL_VERIFIKASI_3
 * @property string|null $TGL_KIRIM_TTD
 * @property string|null $TGL_TERIMA_TTD
 * @property string|null $FILE_SPPT
 */
class SpptE extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sppt_e';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'required'],
            [['THN_PAJAK_SPPT', 'TGL_PEMBAYARAN_TERAKHIR', 'TGL_DIBUAT', 'TGL_EMAIL', 'TGL_RECORD', 'TGL_VERIFIKASI_1', 'TGL_VERIFIKASI_2', 'TGL_VERIFIKASI_3', 'TGL_KIRIM_TTD', 'TGL_TERIMA_TTD'], 'safe'],
            [['FILE_SPPT'], 'string'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['EMAIL'], 'string', 'max' => 500],
            [['NM_WP_SPPT'], 'string', 'max' => 255],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT','CETAK_KE'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT','CETAK_KE']],
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
            'THN_PAJAK_SPPT' => 'Thn Pajak Sppt',
            'EMAIL' => 'Email',
            'NM_WP_SPPT' => 'Nm Wp Sppt',
            'TGL_PEMBAYARAN_TERAKHIR' => 'Tgl Pembayaran Terakhir',
            'TGL_DIBUAT' => 'Tgl Dibuat',
            'TGL_EMAIL' => 'Tgl Email',
            'TGL_RECORD' => 'Tgl Record',
            'TGL_VERIFIKASI_1' => 'Tgl Verifikasi 1',
            'TGL_VERIFIKASI_2' => 'Tgl Verifikasi 2',
            'TGL_VERIFIKASI_3' => 'Tgl Verifikasi 3',
            'TGL_KIRIM_TTD' => 'Tgl Kirim Ttd',
            'TGL_TERIMA_TTD' => 'Tgl Terima Ttd',
            'FILE_SPPT' => 'File Sppt',
        ];
    }

    public static function tglIndo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    public static function getButuhTtd($post_data)
    {
        extract($post_data);

        $sql_limit = '';
        
        if(isset($limit)){
          $sql_limit = "LIMIT $limit";
          if(isset($offset))
            $sql_limit .= ",$offset";
        }

        $sql_where = '';
        if(isset($nop)){
          $sql_where .= " AND KD_PROPINSI = ".substr($nop, 0, 2);
          $sql_where .= " AND KD_DATI2 = ".substr($nop, 2, 2);
          $sql_where .= " AND KD_KECAMATAN = ".substr($nop, 4, 3);
          $sql_where .= " AND KD_KELURAHAN = ".substr($nop, 7, 3);
          $sql_where .= " AND KD_BLOK = ".substr($nop, 10, 3);
          $sql_where .= " AND NO_URUT = ".substr($nop, 13, 4);
          $sql_where .= " AND KD_JNS_OP = ".substr($nop, 17, 1);
        }

        if(isset($tahun)){
          $sql_where .= " AND THN_PAJAK_SPPT = $tahun";
        }

        if(isset($nama)){
          $sql_where .= " AND NM_WP_SPPT LIKE '%$nama%'";
        }

        if(isset($pbb_min)){
          $sql_where .= " AND PBB_YG_HARUS_DIBAYAR > $pbb_min";
        }

        if(isset($pbb_max)){
          $sql_where .= " AND PBB_YG_HARUS_DIBAYAR < $pbb_max";
        }

        $sql = "SELECT 
                  CONCAT(
                    KD_PROPINSI,
                    KD_DATI2,
                    KD_KECAMATAN,
                    KD_KELURAHAN,
                    KD_BLOK,
                    NO_URUT,
                    KD_JNS_OP,
                    THN_PAJAK_SPPT,
                    CETAK_KE
                  ) AS KUNCI,
                  KD_PROPINSI,
                  KD_DATI2,
                  KD_KECAMATAN,
                  KD_KELURAHAN,
                  KD_BLOK,
                  NO_URUT,
                  KD_JNS_OP,
                  THN_PAJAK_SPPT,
                  CETAK_KE,
                  FILE_SPPT,
                  EMAIL,
                  NM_WP_SPPT,
                  PBB_YG_HARUS_DIBAYAR,
                  TGL_PEMBAYARAN_TERAKHIR,
                  TGL_DIBUAT
                FROM
                  sppt_e 
                WHERE TGL_DIBUAT IS NOT NULL 
                  AND TGL_TERIMA_TTD IS NULL 
                  AND FILE_SPPT IS NOT NULL
                $sql_where
                $sql_limit
                ";
        $connection = Yii::$app->db;
        $model = $connection->createCommand($sql);
        return $model->queryAll();
    }

    public static function getButuhTtdCount($post_data)
    {
        extract($post_data);

        $sql_where = '';
        if(isset($nop)){
          $sql_where .= " AND KD_PROPINSI = ".substr($nop, 0, 2);
          $sql_where .= " AND KD_DATI2 = ".substr($nop, 2, 2);
          $sql_where .= " AND KD_KECAMATAN = ".substr($nop, 4, 3);
          $sql_where .= " AND KD_KELURAHAN = ".substr($nop, 7, 3);
          $sql_where .= " AND KD_BLOK = ".substr($nop, 10, 3);
          $sql_where .= " AND NO_URUT = ".substr($nop, 13, 4);
          $sql_where .= " AND KD_JNS_OP = ".substr($nop, 17, 1);
        }

        if(isset($tahun)){
          $sql_where .= " AND THN_PAJAK_SPPT = $tahun";
        }

        if(isset($nama)){
          $sql_where .= " AND NM_WP_SPPT LIKE '%$nama%'";
        }

        if(isset($pbb_min)){
          $sql_where .= " AND PBB_YG_HARUS_DIBAYAR > $pbb_min";
        }

        if(isset($pbb_max)){
          $sql_where .= " AND PBB_YG_HARUS_DIBAYAR < $pbb_max";
        }

        $sql = "SELECT 
                  COUNT(1) AS total 
                FROM
                  sppt_e 
                WHERE TGL_DIBUAT IS NOT NULL 
                  AND TGL_TERIMA_TTD IS NULL
                $sql_where
               ";

        $connection = Yii::$app->db;
        $model = $connection->createCommand($sql);
        // echo $sql;exit;
        return $model->queryOne();
    }


    public static function syncEmail()
    {
        $sql = "UPDATE 
                  sppt_e 
                  JOIN `pencatatan_email` USING (
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP,
                      NM_WP_SPPT
                    ) 
                SET sppt_e.`EMAIL` = pencatatan_email.`EMAIL`
                WHERE TGL_EMAIL IS NULL";

        $connection = Yii::$app->db;
        $model = $connection->createCommand($sql);
        return $model->execute();
    }

    public static function syncPembayaranTerakhir()
    {
        $connection = Yii::$app->db;

        $sql_1 = "CREATE TABLE tgl_pembayaran_terakhir AS 
                SELECT 
                  KD_PROPINSI,
                  KD_DATI2,
                  KD_KECAMATAN,
                  KD_KELURAHAN,
                  KD_BLOK,
                  NO_URUT,
                  KD_JNS_OP,
                  MAX(TGL_PEMBAYARAN_SPPT) AS TGL_PEMBAYARAN_TERAKHIR 
                FROM
                  pembayaran_sppt 
                GROUP BY KD_PROPINSI,
                  KD_DATI2,
                  KD_KECAMATAN,
                  KD_KELURAHAN,
                  KD_BLOK,
                  NO_URUT,
                  KD_JNS_OP ";
        $sql_2 = "ALTER TABLE tgl_pembayaran_terakhir 
                  ADD PRIMARY KEY (
                    KD_PROPINSI,
                    KD_DATI2,
                    KD_KECAMATAN,
                    KD_KELURAHAN,
                    KD_BLOK,
                    NO_URUT,
                    KD_JNS_OP
                  )";
        $sql_3 = "UPDATE 
                  sppt_e 
                  JOIN tgl_pembayaran_terakhir USING (
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP
                    ) SET sppt_e.`TGL_PEMBAYARAN_TERAKHIR` = tgl_pembayaran_terakhir.`TGL_PEMBAYARAN_TERAKHIR`";

        $sql_4 = "DROP TABLE tgl_pembayaran_terakhir ";

        $model = $connection->createCommand($sql_1);
        $model->execute();

        $model = $connection->createCommand($sql_2);
        $model->execute();

        $model = $connection->createCommand($sql_3);
        $model->execute();

        $model = $connection->createCommand($sql_4);
        $model->execute();
    }

    public static function getSudahTtd($post_data)
    {
        extract($post_data);

        $sql_limit = '';
        
        if(isset($limit)){
          $sql_limit = "LIMIT $limit";
          if(isset($offset))
            $sql_limit .= ",$offset";
        }

        $sql_where = '';
        if(isset($nop)){
          $sql_where .= " AND KD_PROPINSI = ".substr($nop, 0, 2);
          $sql_where .= " AND KD_DATI2 = ".substr($nop, 2, 2);
          $sql_where .= " AND KD_KECAMATAN = ".substr($nop, 4, 3);
          $sql_where .= " AND KD_KELURAHAN = ".substr($nop, 7, 3);
          $sql_where .= " AND KD_BLOK = ".substr($nop, 10, 3);
          $sql_where .= " AND NO_URUT = ".substr($nop, 13, 4);
          $sql_where .= " AND KD_JNS_OP = ".substr($nop, 17, 1);
        }

        if(isset($tahun)){
          $sql_where .= " AND THN_PAJAK_SPPT = $tahun";
        }

        if(isset($nama)){
          $sql_where .= " AND NM_WP_SPPT LIKE '%$nama%'";
        }

        if(isset($pbb_min)){
          $sql_where .= " AND PBB_YG_HARUS_DIBAYAR > $pbb_min";
        }

        if(isset($pbb_max)){
          $sql_where .= " AND PBB_YG_HARUS_DIBAYAR < $pbb_max";
        }
        $sql = "SELECT 
                  CONCAT(
                    KD_PROPINSI,
                    KD_DATI2,
                    KD_KECAMATAN,
                    KD_KELURAHAN,
                    KD_BLOK,
                    NO_URUT,
                    KD_JNS_OP,
                    THN_PAJAK_SPPT,
                    CETAK_KE
                  ) AS KUNCI,
                  FILE_SPPT 
                FROM
                  sppt_e 
                WHERE TGL_DIBUAT IS NOT NULL 
                  AND TGL_TERIMA_TTD IS NOT NULL 
                $sql_where
                $sql_limit";
                
        $connection = Yii::$app->db;
        $model = $connection->createCommand($sql);
        return $model->queryAll();
    }

    public static function getSpptEMax($f_prop,$f_dati2,$f_kec,$f_kel,$f_tahun,$f_pbb_start,$f_pbb_end,$limit)
    {
        $condition = '';
        if(!empty($f_kec))
          $condition .= " AND `KD_KECAMATAN` = '$f_kec' ";

        if(!empty($f_kel))
          $condition .= " AND `KD_KELURAHAN` = '$f_kel' ";

        $sql = "SELECT
                  sppt_e.*
                FROM
                  sppt_e
                  JOIN
                    (SELECT
                      `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_BLOK`,
                      `NO_URUT`,
                      `KD_JNS_OP`,
                      `THN_PAJAK_SPPT`,
                      MAX(`CETAK_KE`) AS CETAK_KE
                    FROM
                      `sppt_e`
                    WHERE `KD_PROPINSI` = '$f_prop'
                      AND `KD_DATI2` = '$f_dati2'
                      $condition
                      AND `THN_PAJAK_SPPT` = $f_tahun
                      AND PBB_YG_HARUS_DIBAYAR BETWEEN $f_pbb_start
                      AND $f_pbb_end
                      AND FILE_SPPT IS NULL
                    GROUP BY `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_BLOK`,
                      `NO_URUT`,
                      `KD_JNS_OP`,
                      `THN_PAJAK_SPPT`
                    LIMIT $limit) AS a USING (
                      `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_BLOK`,
                      `NO_URUT`,
                      `KD_JNS_OP`,
                      `THN_PAJAK_SPPT`,
                      `CETAK_KE`
                    )";

        $connection = Yii::$app->db;
        $model = $connection->createCommand($sql);
        return $model->queryAll();
    }

    public static function getSpptEMaxCetak($f_prop,$f_dati2,$f_kec,$f_kel,$f_tahun,$f_pbb_start,$f_pbb_end)
    {
        $sql = "SELECT
                  sppt_e.*
                FROM
                  sppt_e
                  JOIN
                    (SELECT
                      `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_BLOK`,
                      `NO_URUT`,
                      `KD_JNS_OP`,
                      `THN_PAJAK_SPPT`,
                      MAX(`CETAK_KE`) AS CETAK_KE
                    FROM
                      `sppt_e`
                    WHERE `KD_PROPINSI` = '$f_prop'
                      AND `KD_DATI2` = '$f_dati2'
                      AND `KD_KECAMATAN` = '$f_kec'
                      AND `KD_KELURAHAN` = '$f_kel'
                      AND `THN_PAJAK_SPPT` = $f_tahun
                      AND PBB_YG_HARUS_DIBAYAR BETWEEN $f_pbb_start
                      AND $f_pbb_end AND TGL_DIBUAT IS NOT NULL
                    GROUP BY `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_BLOK`,
                      `NO_URUT`,
                      `KD_JNS_OP`,
                      `THN_PAJAK_SPPT`) AS a USING (
                      `KD_PROPINSI`,
                      `KD_DATI2`,
                      `KD_KECAMATAN`,
                      `KD_KELURAHAN`,
                      `KD_BLOK`,
                      `NO_URUT`,
                      `KD_JNS_OP`,
                      `THN_PAJAK_SPPT`,
                      `CETAK_KE`
                    )";

        $connection = Yii::$app->db;
        $model = $connection->createCommand($sql);
        return $model->queryAll();
    }

    public static function verifikasiLimit($limit,$idVerif,$verifikator)
    {
      $sql = "
          UPDATE 
            sppt_e 
            JOIN 
              (SELECT 
                KD_PROPINSI,
                KD_DATI2,
                KD_KECAMATAN,
                KD_KELURAHAN,
                KD_BLOK,
                NO_URUT,
                KD_JNS_OP,
                THN_PAJAK_SPPT,
                CETAK_KE 
              FROM
                sppt_e 
              WHERE TGL_DIBUAT IS NOT NULL 
                AND TGL_VERIFIKASI_$idVerif IS NULL 
                AND FILE_SPPT IS NOT NULL 
              LIMIT $limit) AS a USING (
                KD_PROPINSI,
                KD_DATI2,
                KD_KECAMATAN,
                KD_KELURAHAN,
                KD_BLOK,
                NO_URUT,
                KD_JNS_OP,
                THN_PAJAK_SPPT,
                CETAK_KE
              ) SET NIP_VERIFIKASI_$idVerif = '$verifikator',
            TGL_VERIFIKASI_$idVerif = NOW()

      ";
       // echo $sql;exit;
       $connection = Yii::$app->db;
       $model = $connection->createCommand($sql);
       return $model->execute();
    }

    public static function getTotalSpptE($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END)
    {
        $query = SpptE::find();

        if(!empty($KD_KECAMATAN))
            $query->andWhere(['KD_KECAMATAN'=>$KD_KECAMATAN]);

        if(!empty($KD_KELURAHAN))
            $query->andWhere(['KD_KELURAHAN'=>$KD_KELURAHAN]);

        if(!empty($THN_PAJAK_SPPT))
            $query->andWhere(['THN_PAJAK_SPPT'=>$THN_PAJAK_SPPT]);

        if(!empty($PBB_END))
            $query->andWhere(['between', 'PBB_YG_HARUS_DIBAYAR', $PBB_START, $PBB_END]);

        return $query->count();
    }

    public static function getDibuatSpptE($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END)
    {
        $query = SpptE::find();

        $query->andWhere(['not',['FILE_SPPT'=>null]]);

        if(!empty($KD_KECAMATAN))
            $query->andWhere(['KD_KECAMATAN'=>$KD_KECAMATAN]);

        if(!empty($KD_KELURAHAN))
            $query->andWhere(['KD_KELURAHAN'=>$KD_KELURAHAN]);

        if(!empty($THN_PAJAK_SPPT))
            $query->andWhere(['THN_PAJAK_SPPT'=>$THN_PAJAK_SPPT]);

        if(!empty($PBB_END))
            $query->andWhere(['between', 'PBB_YG_HARUS_DIBAYAR', $PBB_START, $PBB_END]);

        return $query->count();
    }

    public static function getTerverifikasi1($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END)
    {
        $query = SpptE::find();

        $query->andWhere(['not',['TGL_DIBUAT'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_1'=>null]]);

        if(!empty($KD_KECAMATAN))
            $query->andWhere(['KD_KECAMATAN'=>$KD_KECAMATAN]);

        if(!empty($KD_KELURAHAN))
            $query->andWhere(['KD_KELURAHAN'=>$KD_KELURAHAN]);

        if(!empty($THN_PAJAK_SPPT))
            $query->andWhere(['THN_PAJAK_SPPT'=>$THN_PAJAK_SPPT]);

        if(!empty($PBB_END))
            $query->andWhere(['between', 'PBB_YG_HARUS_DIBAYAR', $PBB_START, $PBB_END]);

        return $query->count();
    }

    public static function getTerverifikasi2($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END)
    {
        $query = SpptE::find();

        $query->andWhere(['not',['TGL_DIBUAT'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_2'=>null]]);

        if(!empty($KD_KECAMATAN))
            $query->andWhere(['KD_KECAMATAN'=>$KD_KECAMATAN]);

        if(!empty($KD_KELURAHAN))
            $query->andWhere(['KD_KELURAHAN'=>$KD_KELURAHAN]);

        if(!empty($THN_PAJAK_SPPT))
            $query->andWhere(['THN_PAJAK_SPPT'=>$THN_PAJAK_SPPT]);

        if(!empty($PBB_END))
            $query->andWhere(['between', 'PBB_YG_HARUS_DIBAYAR', $PBB_START, $PBB_END]);

        return $query->count();
    }

    public static function getTerverifikasi3($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END)
    {
        $query = SpptE::find();

        $query->andWhere(['not',['TGL_DIBUAT'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_3'=>null]]);

        if(!empty($KD_KECAMATAN))
            $query->andWhere(['KD_KECAMATAN'=>$KD_KECAMATAN]);

        if(!empty($KD_KELURAHAN))
            $query->andWhere(['KD_KELURAHAN'=>$KD_KELURAHAN]);

        if(!empty($THN_PAJAK_SPPT))
            $query->andWhere(['THN_PAJAK_SPPT'=>$THN_PAJAK_SPPT]);

        if(!empty($PBB_END))
            $query->andWhere(['between', 'PBB_YG_HARUS_DIBAYAR', $PBB_START, $PBB_END]);

        return $query->count();
    }

    public static function getTerverifikasi($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END)
    {
        $query = SpptE::find();

        $query->andWhere(['not',['TGL_DIBUAT'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_1'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_2'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_3'=>null]]);

        if(!empty($KD_KECAMATAN))
            $query->andWhere(['KD_KECAMATAN'=>$KD_KECAMATAN]);

        if(!empty($KD_KELURAHAN))
            $query->andWhere(['KD_KELURAHAN'=>$KD_KELURAHAN]);

        if(!empty($THN_PAJAK_SPPT))
            $query->andWhere(['THN_PAJAK_SPPT'=>$THN_PAJAK_SPPT]);

        if(!empty($PBB_END))
            $query->andWhere(['between', 'PBB_YG_HARUS_DIBAYAR', $PBB_START, $PBB_END]);

        return $query->count();
    }

    public static function getTerTerimaTtd($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END)
    {
        $query = SpptE::find();

        $query->andWhere(['not',['TGL_DIBUAT'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_1'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_2'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_3'=>null]]);
        $query->andWhere(['not',['TGL_TERIMA_TTD'=>null]]);

        if(!empty($KD_KECAMATAN))
            $query->andWhere(['KD_KECAMATAN'=>$KD_KECAMATAN]);

        if(!empty($KD_KELURAHAN))
            $query->andWhere(['KD_KELURAHAN'=>$KD_KELURAHAN]);

        if(!empty($THN_PAJAK_SPPT))
            $query->andWhere(['THN_PAJAK_SPPT'=>$THN_PAJAK_SPPT]);

        if(!empty($PBB_END))
            $query->andWhere(['between', 'PBB_YG_HARUS_DIBAYAR', $PBB_START, $PBB_END]);

        return $query->count();
    }

    public static function getTerEmail($KD_KECAMATAN,$KD_KELURAHAN,$THN_PAJAK_SPPT,$PBB_START,$PBB_END)
    {
        $query = SpptE::find();

        $query->andWhere(['not',['TGL_DIBUAT'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_1'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_2'=>null]]);
        $query->andWhere(['not',['TGL_VERIFIKASI_3'=>null]]);
        $query->andWhere(['not',['TGL_TERIMA_TTD'=>null]]);
        $query->andWhere(['not',['TGL_EMAIL'=>null]]);

        if(!empty($KD_KECAMATAN))
            $query->andWhere(['KD_KECAMATAN'=>$KD_KECAMATAN]);

        if(!empty($KD_KELURAHAN))
            $query->andWhere(['KD_KELURAHAN'=>$KD_KELURAHAN]);

        if(!empty($THN_PAJAK_SPPT))
            $query->andWhere(['THN_PAJAK_SPPT'=>$THN_PAJAK_SPPT]);

        if(!empty($PBB_END))
            $query->andWhere(['between', 'PBB_YG_HARUS_DIBAYAR', $PBB_START, $PBB_END]);

        return $query->count();
    }

    public static function hariIni(){
        $hari = date ("D");
 
        switch($hari){
            case 'Sun':
                $hari_ini = "Minggu";
            break;
     
            case 'Mon':         
                $hari_ini = "Senin";
            break;
     
            case 'Tue':
                $hari_ini = "Selasa";
            break;
     
            case 'Wed':
                $hari_ini = "Rabu";
            break;
     
            case 'Thu':
                $hari_ini = "Kamis";
            break;
     
            case 'Fri':
                $hari_ini = "Jumat";
            break;
     
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";     
            break;
        }
     
        return $hari_ini;
     
    }

    public static function penyebut($nilai) {
      $nilai = abs($nilai);
      $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
      $temp = "";
      if ($nilai < 12) {
       $temp = " ". $huruf[$nilai];
      } else if ($nilai <20) {
       $temp = SpptE::penyebut($nilai - 10). " belas";
      } else if ($nilai < 100) {
       $temp = SpptE::penyebut($nilai/10)." puluh". SpptE::penyebut($nilai % 10);
      } else if ($nilai < 200) {
       $temp = " seratus" . SpptE::penyebut($nilai - 100);
      } else if ($nilai < 1000) {
       $temp = SpptE::penyebut($nilai/100) . " ratus" . SpptE::penyebut($nilai % 100);
      } else if ($nilai < 2000) {
       $temp = " seribu" . SpptE::penyebut($nilai - 1000);
      } else if ($nilai < 1000000) {
       $temp = SpptE::penyebut($nilai/1000) . " ribu" . SpptE::penyebut($nilai % 1000);
      } else if ($nilai < 1000000000) {
       $temp = SpptE::penyebut($nilai/1000000) . " juta" . SpptE::penyebut($nilai % 1000000);
      } else if ($nilai < 1000000000000) {
       $temp = SpptE::penyebut($nilai/1000000000) . " milyar" . SpptE::penyebut(fmod($nilai,1000000000));
      } else if ($nilai < 1000000000000000) {
       $temp = SpptE::penyebut($nilai/1000000000000) . " trilyun" . SpptE::penyebut(fmod($nilai,1000000000000));
      }   
      return $temp;
     }

    public static function terbilang($nilai) {
      if($nilai<0) {
       $hasil = "minus ". trim($this->penyebut($nilai));
      } else {
       $hasil = trim(SpptE::penyebut($nilai));
      }       
      return $hasil;
     }

     //Fungsi konversi nama bulan ke dalam bahasa indonesia
     public static function getBulan($bln){
        switch ($bln){
         case 1:
          return "Januari";
          break;
         case 2:
          return "Februari";
          break;
         case 3:
          return "Maret";
          break;
         case 4:
          return "April";
          break;
         case 5:
          return "Mei";
          break;
         case 6:
          return "Juni";
          break;
         case 7:
          return "Juli";
          break;
         case 8:
          return "Agustus";
          break;
         case 9:
          return "September";
          break;
         case 10:
          return "Oktober";
          break;
         case 11:
          return "November";
          break;
         case 12:
          return "Desember";
          break;
        }
    }

}
