<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fasilitas".
 *
 * @property string $KD_FASILITAS
 * @property string $NM_FASILITAS
 * @property string $SATUAN_FASILITAS
 * @property string $STATUS_FASILITAS
 * @property string $KETERGANTUNGAN
 */
class Fasilitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fasilitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_FASILITAS'], 'required'],
            [['KD_FASILITAS'], 'string', 'max' => 2],
            [['NM_FASILITAS'], 'string', 'max' => 50],
            [['SATUAN_FASILITAS'], 'string', 'max' => 10],
            [['STATUS_FASILITAS', 'KETERGANTUNGAN'], 'string', 'max' => 1],
            [['KD_FASILITAS'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_FASILITAS' => 'Kd Fasilitas',
            'NM_FASILITAS' => 'Nm Fasilitas',
            'SATUAN_FASILITAS' => 'Satuan Fasilitas',
            'STATUS_FASILITAS' => 'Status Fasilitas',
            'KETERGANTUNGAN' => 'Ketergantungan',
        ];
    }
}
