<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "range_penyusutan".
 *
 * @property string $KD_RANGE_PENYUSUTAN
 * @property int $NILAI_MIN_PENYUSUTAN
 * @property int $NILAI_MAX_PENYUSUTAN
 */
class RangePenyusutan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'range_penyusutan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_RANGE_PENYUSUTAN'], 'required'],
            [['NILAI_MIN_PENYUSUTAN', 'NILAI_MAX_PENYUSUTAN'], 'integer'],
            [['KD_RANGE_PENYUSUTAN'], 'string', 'max' => 1],
            [['KD_RANGE_PENYUSUTAN'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_RANGE_PENYUSUTAN' => 'Kd Range Penyusutan',
            'NILAI_MIN_PENYUSUTAN' => 'Nilai Min Penyusutan',
            'NILAI_MAX_PENYUSUTAN' => 'Nilai Max Penyusutan',
        ];
    }
}
