<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemekaran_detail".
 *
 * @property int $ID
 * @property int $PEMEKARAN_ID
 * @property string $KD_PROPINSI_LAMA
 * @property string $KD_DATI2_LAMA
 * @property string $KD_KECAMATAN_LAMA
 * @property string $KD_KELURAHAN_LAMA
 * @property string $KD_BLOK_LAMA
 * @property string $NO_URUT_LAMA
 * @property string $KD_JNS_OP_LAMA
 * @property string $KD_PROPINSI_BARU
 * @property string $KD_DATI2_BARU
 * @property string $KD_KECAMATAN_BARU
 * @property string $KD_KELURAHAN_BARU
 * @property string $KD_BLOK_BARU
 * @property string $NO_URUT_BARU
 * @property string $KD_JNS_OP_BARU
 */
class PemekaranDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemekaran_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PEMEKARAN_ID'], 'integer'],
            [['KD_PROPINSI_LAMA', 'KD_DATI2_LAMA', 'KD_KECAMATAN_LAMA', 'KD_KELURAHAN_LAMA', 'KD_BLOK_LAMA', 'NO_URUT_LAMA', 'KD_JNS_OP_LAMA', 'KD_PROPINSI_BARU', 'KD_DATI2_BARU', 'KD_KECAMATAN_BARU', 'KD_KELURAHAN_BARU', 'KD_BLOK_BARU', 'NO_URUT_BARU', 'KD_JNS_OP_BARU'], 'required'],
            [['KD_PROPINSI_LAMA', 'KD_DATI2_LAMA', 'KD_PROPINSI_BARU', 'KD_DATI2_BARU'], 'string', 'max' => 2],
            [['KD_KECAMATAN_LAMA', 'KD_KELURAHAN_LAMA', 'KD_BLOK_LAMA', 'KD_KECAMATAN_BARU', 'KD_KELURAHAN_BARU', 'KD_BLOK_BARU'], 'string', 'max' => 3],
            [['NO_URUT_LAMA', 'NO_URUT_BARU'], 'string', 'max' => 4],
            [['KD_JNS_OP_LAMA', 'KD_JNS_OP_BARU'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'PEMEKARAN_ID' => 'Pemekaran ID',
            'KD_PROPINSI_LAMA' => 'Kd Propinsi Lama',
            'KD_DATI2_LAMA' => 'Kd Dati2 Lama',
            'KD_KECAMATAN_LAMA' => 'Kd Kecamatan Lama',
            'KD_KELURAHAN_LAMA' => 'Kd Kelurahan Lama',
            'KD_BLOK_LAMA' => 'Kd Blok Lama',
            'NO_URUT_LAMA' => 'No Urut Lama',
            'KD_JNS_OP_LAMA' => 'Kd Jns Op Lama',
            'KD_PROPINSI_BARU' => 'Kd Propinsi Baru',
            'KD_DATI2_BARU' => 'Kd Dati2 Baru',
            'KD_KECAMATAN_BARU' => 'Kd Kecamatan Baru',
            'KD_KELURAHAN_BARU' => 'Kd Kelurahan Baru',
            'KD_BLOK_BARU' => 'Kd Blok Baru',
            'NO_URUT_BARU' => 'No Urut Baru',
            'KD_JNS_OP_BARU' => 'Kd Jns Op Baru',
        ];
    }
}
