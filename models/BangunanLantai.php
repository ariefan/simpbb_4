<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bangunan_lantai".
 *
 * @property string $KD_JPB
 * @property string $TIPE_BNG
 * @property string $KD_BNG_LANTAI
 * @property int $LANTAI_MIN_BNG_LANTAI
 * @property int $LANTAI_MAX_BNG_LANTAI
 */
class BangunanLantai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bangunan_lantai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_JPB', 'TIPE_BNG', 'KD_BNG_LANTAI'], 'required'],
            [['LANTAI_MIN_BNG_LANTAI', 'LANTAI_MAX_BNG_LANTAI'], 'integer'],
            [['KD_JPB'], 'string', 'max' => 2],
            [['TIPE_BNG'], 'string', 'max' => 5],
            [['KD_BNG_LANTAI'], 'string', 'max' => 8],
            [['KD_JPB', 'TIPE_BNG', 'KD_BNG_LANTAI'], 'unique', 'targetAttribute' => ['KD_JPB', 'TIPE_BNG', 'KD_BNG_LANTAI']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_JPB' => 'Kd Jpb',
            'TIPE_BNG' => 'Tipe Bng',
            'KD_BNG_LANTAI' => 'Kd Bng Lantai',
            'LANTAI_MIN_BNG_LANTAI' => 'Lantai Min Bng Lantai',
            'LANTAI_MAX_BNG_LANTAI' => 'Lantai Max Bng Lantai',
        ];
    }
}
