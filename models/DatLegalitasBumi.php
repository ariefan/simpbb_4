<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_legalitas_bumi".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $NO_LEGALITAS_TANAH
 */
class DatLegalitasBumi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_legalitas_bumi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'required'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NO_LEGALITAS_TANAH'], 'string', 'max' => 15],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP']],
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
            'NO_LEGALITAS_TANAH' => 'No Legalitas Tanah',
        ];
    }
}
