<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pekerjaan_kegiatan".
 *
 * @property string $KD_PEKERJAAN
 * @property string $KD_KEGIATAN
 * @property string $NM_KEGIATAN
 */
class PekerjaanKegiatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pekerjaan_kegiatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PEKERJAAN', 'KD_KEGIATAN'], 'required'],
            [['KD_PEKERJAAN', 'KD_KEGIATAN'], 'string', 'max' => 2],
            [['NM_KEGIATAN'], 'string', 'max' => 30],
            [['KD_PEKERJAAN', 'KD_KEGIATAN'], 'unique', 'targetAttribute' => ['KD_PEKERJAAN', 'KD_KEGIATAN']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PEKERJAAN' => 'Kd Pekerjaan',
            'KD_KEGIATAN' => 'Kd Kegiatan',
            'NM_KEGIATAN' => 'Nm Kegiatan',
        ];
    }
}
