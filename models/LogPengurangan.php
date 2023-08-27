<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_pengurangan".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $THN_PAJAK_SPPT
 * @property double $PERMOHONAN_PENGURANGAN
 * @property double $REALISASI_PENGURANGAN
 * @property string $ALASAN_PENGURANGAN
 * @property string $TANGGAL_ENTRY
 * @property string $USER_ENTRY
 */
class LogPengurangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_pengurangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'required'],
            [['THN_PAJAK_SPPT'], 'integer'],
            [['PERMOHONAN_PENGURANGAN', 'REALISASI_PENGURANGAN'], 'number'],
            [['ALASAN_PENGURANGAN'], 'string'],
            [['TANGGAL_ENTRY'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['USER_ENTRY'], 'string', 'max' => 200],
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
            'PERMOHONAN_PENGURANGAN' => 'Permohonan Pengurangan',
            'REALISASI_PENGURANGAN' => 'Realisasi Pengurangan',
            'ALASAN_PENGURANGAN' => 'Alasan Pengurangan',
            'TANGGAL_ENTRY' => 'Tanggal Entry',
            'USER_ENTRY' => 'User Entry',
        ];
    }
}
