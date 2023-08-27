<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_dat_subjek_pajak".
 *
 * @property int $ID_LOG
 * @property string $TANGGAL_LOG
 * @property string $AKSI
 * @property string $SUBJEK_PAJAK_ID
 * @property string $NM_WP
 * @property string $JALAN_WP
 * @property string $BLOK_KAV_NO_WP
 * @property string $RW_WP
 * @property string $RT_WP
 * @property string $KELURAHAN_WP
 * @property string $KOTA_WP
 * @property string $KD_POS_WP
 * @property string $TELP_WP
 * @property string $NPWP
 * @property string $STATUS_PEKERJAAN_WP
 */
class LogDatSubjekPajak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_dat_subjek_pajak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TANGGAL_LOG'], 'safe'],
            [['SUBJEK_PAJAK_ID', 'STATUS_PEKERJAAN_WP'], 'required'],
            [['AKSI'], 'string', 'max' => 10],
            [['SUBJEK_PAJAK_ID', 'NM_WP', 'JALAN_WP', 'KELURAHAN_WP', 'KOTA_WP'], 'string', 'max' => 30],
            [['BLOK_KAV_NO_WP', 'NPWP'], 'string', 'max' => 15],
            [['RW_WP'], 'string', 'max' => 2],
            [['RT_WP'], 'string', 'max' => 3],
            [['KD_POS_WP'], 'string', 'max' => 5],
            [['TELP_WP'], 'string', 'max' => 20],
            [['STATUS_PEKERJAAN_WP'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_LOG' => 'Id Log',
            'TANGGAL_LOG' => 'Tanggal Log',
            'AKSI' => 'Aksi',
            'SUBJEK_PAJAK_ID' => 'Subjek Pajak ID',
            'NM_WP' => 'Nm Wp',
            'JALAN_WP' => 'Jalan Wp',
            'BLOK_KAV_NO_WP' => 'Blok Kav No Wp',
            'RW_WP' => 'Rw Wp',
            'RT_WP' => 'Rt Wp',
            'KELURAHAN_WP' => 'Kelurahan Wp',
            'KOTA_WP' => 'Kota Wp',
            'KD_POS_WP' => 'Kd Pos Wp',
            'TELP_WP' => 'Telp Wp',
            'NPWP' => 'Npwp',
            'STATUS_PEKERJAAN_WP' => 'Status Pekerjaan Wp',
        ];
    }
}
