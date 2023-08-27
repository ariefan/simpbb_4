<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bphtb_dasar_setoran".
 *
 * @property string $NO_BPHTB
 * @property string $KD_JNS_SETORAN
 * @property string $SK_JENIS
 * @property string $SK_NOMOR
 * @property string $SK_TANGGAL
 * @property string $JNS_PENGURANGAN
 * @property string $ALASAN_PENGURANGAN
 * @property string $SK_LAIN_JENIS
 * @property string $SK_LAIN_NOMOR
 * @property string $SK_LAIN_TANGGAL
 * @property string $KEKURANGAN_NO_BPHTB
 * @property int $JML_SETORAN
 * @property string $KETERANGAN
 */
class BphtbDasarSetoran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bphtb_dasar_setoran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NO_BPHTB'], 'required'],
            [['SK_TANGGAL', 'SK_LAIN_TANGGAL'], 'safe'],
            [['JML_SETORAN'], 'integer'],
            [['KETERANGAN'], 'string'],
            [['NO_BPHTB', 'SK_JENIS', 'SK_NOMOR', 'JNS_PENGURANGAN', 'ALASAN_PENGURANGAN', 'SK_LAIN_JENIS', 'SK_LAIN_NOMOR', 'KEKURANGAN_NO_BPHTB'], 'string', 'max' => 50],
            [['KD_JNS_SETORAN'], 'string', 'max' => 2],
            [['NO_BPHTB'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NO_BPHTB' => 'No Bphtb',
            'KD_JNS_SETORAN' => 'Kd Jns Setoran',
            'SK_JENIS' => 'Sk Jenis',
            'SK_NOMOR' => 'Sk Nomor',
            'SK_TANGGAL' => 'Sk Tanggal',
            'JNS_PENGURANGAN' => 'Jns Pengurangan',
            'ALASAN_PENGURANGAN' => 'Alasan Pengurangan',
            'SK_LAIN_JENIS' => 'Sk Lain Jenis',
            'SK_LAIN_NOMOR' => 'Sk Lain Nomor',
            'SK_LAIN_TANGGAL' => 'Sk Lain Tanggal',
            'KEKURANGAN_NO_BPHTB' => 'Kekurangan No Bphtb',
            'JML_SETORAN' => 'Jml Setoran',
            'KETERANGAN' => 'Keterangan',
        ];
    }
}
