<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_subjek_pajak_mobile".
 *
 * @property string $USER_ID
 * @property string $LAST_MODIFIED
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
class DatSubjekPajakMobile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_subjek_pajak_mobile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USER_ID', 'SUBJEK_PAJAK_ID', 'NM_WP', 'JALAN_WP', 'STATUS_PEKERJAAN_WP'], 'required'],
            [['LAST_MODIFIED'], 'safe'],
            [['USER_ID'], 'string', 'max' => 50],
            [['SUBJEK_PAJAK_ID', 'NM_WP', 'JALAN_WP', 'KELURAHAN_WP', 'KOTA_WP'], 'string', 'max' => 30],
            [['BLOK_KAV_NO_WP', 'NPWP'], 'string', 'max' => 15],
            [['RW_WP'], 'string', 'max' => 2],
            [['RT_WP'], 'string', 'max' => 3],
            [['KD_POS_WP'], 'string', 'max' => 5],
            [['TELP_WP'], 'string', 'max' => 20],
            [['STATUS_PEKERJAAN_WP'], 'string', 'max' => 1],
            [['USER_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => 'User ID',
            'LAST_MODIFIED' => 'Last Modified',
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
