<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelurahan_tertentu".
 *
 * @property string $Nama
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 */
class KelurahanTertentu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelurahan_tertentu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nama'], 'string', 'max' => 255],
            [['KD_KECAMATAN', 'KD_KELURAHAN'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Nama' => 'Nama',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
        ];
    }
}
