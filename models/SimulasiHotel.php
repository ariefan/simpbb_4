<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "simulasi_hotel".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $NM_WP
 * @property int $PBB_LAMA
 * @property int $NJOP_LAMA
 * @property int $LUAS_LAMA
 * @property string $KELAS_LAMA
 * @property int $PBB_BARU
 * @property int $NJOP_BARU
 * @property int $LUAS_BARU
 * @property resource $KELAS_BARU
 */
class SimulasiHotel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'simulasi_hotel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'required'],
            [['PBB_LAMA', 'NJOP_LAMA', 'LUAS_LAMA', 'PBB_BARU', 'NJOP_BARU', 'LUAS_BARU'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'KELAS_LAMA', 'KELAS_BARU'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NM_WP'], 'string', 'max' => 200],
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
            'NM_WP' => 'Nm Wp',
            'PBB_LAMA' => 'Pbb Lama',
            'NJOP_LAMA' => 'Njop Lama',
            'LUAS_LAMA' => 'Luas Lama',
            'KELAS_LAMA' => 'Kelas Lama',
            'PBB_BARU' => 'Pbb Baru',
            'NJOP_BARU' => 'Njop Baru',
            'LUAS_BARU' => 'Luas Baru',
            'KELAS_BARU' => 'Kelas Baru',
        ];
    }
}
