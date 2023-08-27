<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sppt_khusus".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $JENIS_SPPT
 */
class SpptKhusus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sppt_khusus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'required'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'JENIS_SPPT'], 'string', 'max' => 1],
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
            'KD_KECAMATAN' => 'KC',
            'KD_KELURAHAN' => 'KL',
            'KD_BLOK' => 'BL',
            'NO_URUT' => 'NO',
            'KD_JNS_OP' => 'KD',
            'JENIS_SPPT' => 'Jenis  Sppt',
        ];
    }

    public function getJenis()
    {
        return $this->hasOne(JenisSppt::className(), ['id' => 'JENIS_SPPT']);
    }

    public function getLaporan($kec,$kel,$tahun,$status,$jenis){

        $q_status = '';
        if($status!=11)
          $q_status .= " AND STATUS_PEMBAYARAN_SPPT = $status";
        
        if($jenis!=11)
          $q_status .= " AND JENIS_SPPT = $jenis";

        $sql = "SELECT 
                  KD_KECAMATAN,
                  KD_KELURAHAN,
                  KD_BLOK,
                  NO_URUT,
                  KD_JNS_OP,
                  NM_WP_SPPT AS NAMA_WP,
                  NM_KECAMATAN,
                  NM_KELURAHAN,
                  spop.`JALAN_OP`,
                  spop.`KELURAHAN_OP`,
                  LUAS_BUMI_SPPT AS LUAS_BUMI,
                  LUAS_BNG_SPPT AS LUAS_BNG,
                  PBB_YG_HARUS_DIBAYAR_SPPT AS PBB,
                  jenis_sppt.`name` AS JENIS_SPPT 
                FROM
                  sppt_khusus_2016 
                  JOIN sppt USING (
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP
                    ) 
                  JOIN spop USING (
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN,
                      KD_BLOK,
                      NO_URUT,
                      KD_JNS_OP
                    ) 
                  JOIN ref_kecamatan USING (
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN
                    ) 
                  JOIN ref_kelurahan USING (
                      KD_PROPINSI,
                      KD_DATI2,
                      KD_KECAMATAN,
                      KD_KELURAHAN
                    ) 
                  JOIN jenis_sppt 
                    ON sppt_khusus_2016.JENIS_SPPT = jenis_sppt.`id` 
                WHERE KD_KECAMATAN='$kec' AND KD_KELURAHAN='$kel' AND THN_PAJAK_SPPT = $tahun $q_status";
        $connection = Yii::$app->db;
        $model = $connection->createCommand($sql);
        return $model->queryAll();
    }
}
