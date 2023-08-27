<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengurangan_perhitungan".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property int $ref_id
 * @property int $urutan_id
 * @property int $nilai
 * @property string $keterangan
 */
class PenguranganPerhitungan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengurangan_perhitungan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'ref_id', 'urutan_id'], 'required'],
            [['ref_id', 'urutan_id', 'nilai'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_PAJAK_SPPT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['keterangan'], 'string', 'max' => 1000],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'ref_id', 'urutan_id'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'ref_id', 'urutan_id']],
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
            'ref_id' => 'Ref ID',
            'urutan_id' => 'Urutan ID',
            'nilai' => 'Nilai',
            'keterangan' => 'Keterangan',
        ];
    }
}
