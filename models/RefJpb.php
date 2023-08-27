<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_jpb".
 *
 * @property string $KD_JPB
 * @property string $NM_JPB
 */
class RefJpb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_jpb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_JPB'], 'required'],
            [['KD_JPB'], 'string', 'max' => 2],
            [['NM_JPB'], 'string', 'max' => 50],
            [['KD_JPB'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_JPB' => 'Kd Jpb',
            'NM_JPB' => 'Nm Jpb',
        ];
    }
}
