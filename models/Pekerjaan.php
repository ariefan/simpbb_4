<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pekerjaan".
 *
 * @property string $KD_PEKERJAAN
 * @property string $NM_PEKERJAAN
 * @property string $STATUS_PEKERJAAN
 */
class Pekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pekerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PEKERJAAN'], 'required'],
            [['KD_PEKERJAAN'], 'string', 'max' => 2],
            [['NM_PEKERJAAN'], 'string', 'max' => 30],
            [['STATUS_PEKERJAAN'], 'string', 'max' => 1],
            [['KD_PEKERJAAN'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PEKERJAAN' => 'Kd Pekerjaan',
            'NM_PEKERJAAN' => 'Nm Pekerjaan',
            'STATUS_PEKERJAAN' => 'Status Pekerjaan',
        ];
    }
}
