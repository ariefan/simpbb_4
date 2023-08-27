<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemekaran".
 *
 * @property int $ID
 * @property int $JENIS_PEMEKARAN
 * @property string $KD_PROPINSI_LAMA
 * @property string $KD_DATI2_LAMA
 * @property string $KD_KECAMATAN_LAMA
 * @property string $KD_KELURAHAN_LAMA
 * @property string $KD_BLOK_AWAL
 * @property string $NO_URUT_AWAL
 * @property string $NO_URUT_AKHIR
 * @property string $KD_BLOK_AKHIR
 * @property string $KD_PROPINSI_BARU
 * @property string $KD_DATI2_BARU
 * @property string $KD_KECAMATAN_BARU
 * @property string $KD_KELURAHAN_BARU
 * @property string $KD_BLOK_BARU
 * @property string $TGL_ENTRY
 * @property string $USER_ENTRY
 * @property int $IS_CANCEL
 */
class Pemekaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemekaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['JENIS_PEMEKARAN', 'IS_CANCEL'], 'integer'],
            [['TGL_ENTRY'], 'safe'],
            [['KD_PROPINSI_LAMA', 'KD_DATI2_LAMA', 'KD_PROPINSI_BARU', 'KD_DATI2_BARU'], 'string', 'max' => 2],
            [['KD_KECAMATAN_LAMA', 'KD_KELURAHAN_LAMA', 'KD_BLOK_AWAL', 'KD_BLOK_AKHIR', 'KD_KECAMATAN_BARU', 'KD_KELURAHAN_BARU', 'KD_BLOK_BARU'], 'string', 'max' => 3],
            [['NO_URUT_AWAL', 'NO_URUT_AKHIR'], 'string', 'max' => 4],
            [['USER_ENTRY'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'JENIS_PEMEKARAN' => 'Jenis Pemekaran',
            'KD_PROPINSI_LAMA' => 'Kd Propinsi Lama',
            'KD_DATI2_LAMA' => 'Kd Dati2 Lama',
            'KD_KECAMATAN_LAMA' => 'Kd Kecamatan Lama',
            'KD_KELURAHAN_LAMA' => 'Kd Kelurahan Lama',
            'KD_BLOK_AWAL' => 'Kd Blok Awal',
            'NO_URUT_AWAL' => 'No Urut Awal',
            'NO_URUT_AKHIR' => 'No Urut Akhir',
            'KD_BLOK_AKHIR' => 'Kd Blok Akhir',
            'KD_PROPINSI_BARU' => 'Kd Propinsi Baru',
            'KD_DATI2_BARU' => 'Kd Dati2 Baru',
            'KD_KECAMATAN_BARU' => 'Kd Kecamatan Baru',
            'KD_KELURAHAN_BARU' => 'Kd Kelurahan Baru',
            'KD_BLOK_BARU' => 'Kd Blok Baru',
            'TGL_ENTRY' => 'Tgl Entry',
            'USER_ENTRY' => 'User Entry',
            'IS_CANCEL' => 'Is Cancel',
        ];
    }
}
