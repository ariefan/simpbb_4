<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kayu_ulin".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_STATUS_KAYU_ULIN
 * @property int $STATUS_KAYU_ULIN
 */
class KayuUlin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kayu_ulin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_STATUS_KAYU_ULIN'], 'required'],
            [['STATUS_KAYU_ULIN'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_STATUS_KAYU_ULIN'], 'string', 'max' => 4],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_STATUS_KAYU_ULIN'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_STATUS_KAYU_ULIN']],
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
            'THN_STATUS_KAYU_ULIN' => 'Thn Status Kayu Ulin',
            'STATUS_KAYU_ULIN' => 'Status Kayu Ulin',
        ];
    }
}
