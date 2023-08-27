<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_pbb".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $TAHUN_PBB
 * @property string $TANGGAL_BAYAR
 * @property double $PERMOHONAN_PENGURANGAN
 * @property double $PENGURANGAN_DIBERI
 * @property string $ALASAN_PENGURANGAN
 * @property string $ALASAN_KEBERATAN
 */
class StatusPbb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_pbb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'TAHUN_PBB'], 'required'],
            [['TANGGAL_BAYAR'], 'safe'],
            [['PERMOHONAN_PENGURANGAN', 'PENGURANGAN_DIBERI'], 'number'],
            [['ALASAN_PENGURANGAN', 'ALASAN_KEBERATAN'], 'string'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'TAHUN_PBB'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'TAHUN_PBB'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'TAHUN_PBB']],
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
            'TAHUN_PBB' => 'Tahun Pbb',
            'TANGGAL_BAYAR' => 'Tanggal Bayar',
            'PERMOHONAN_PENGURANGAN' => 'Permohonan Pengurangan',
            'PENGURANGAN_DIBERI' => 'Pengurangan Diberi',
            'ALASAN_PENGURANGAN' => 'Alasan Pengurangan',
            'ALASAN_KEBERATAN' => 'Alasan Keberatan',
        ];
    }
}
