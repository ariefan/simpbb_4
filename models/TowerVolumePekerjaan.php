<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tower_volume_pekerjaan".
 *
 * @property int $KD_PEKERJAAN
 * @property int $TINGGI_MIN
 * @property int $TINGGI_MAX
 * @property string $VOLUME
 */
class TowerVolumePekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tower_volume_pekerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PEKERJAAN', 'TINGGI_MIN', 'TINGGI_MAX'], 'required'],
            [['KD_PEKERJAAN', 'TINGGI_MIN', 'TINGGI_MAX'], 'integer'],
            [['VOLUME'], 'number'],
            [['KD_PEKERJAAN', 'TINGGI_MIN', 'TINGGI_MAX'], 'unique', 'targetAttribute' => ['KD_PEKERJAAN', 'TINGGI_MIN', 'TINGGI_MAX']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PEKERJAAN' => 'Kd Pekerjaan',
            'TINGGI_MIN' => 'Tinggi Min',
            'TINGGI_MAX' => 'Tinggi Max',
            'VOLUME' => 'Volume',
        ];
    }
}
