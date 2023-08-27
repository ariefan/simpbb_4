<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_propinsi".
 *
 * @property string $KD_PROPINSI
 * @property string $NM_PROPINSI
 */
class RefPropinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_propinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'NM_PROPINSI'], 'required'],
            [['KD_PROPINSI'], 'string', 'max' => 2],
            [['NM_PROPINSI'], 'string', 'max' => 30],
            [['KD_PROPINSI'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PROPINSI' => 'Kd Propinsi',
            'NM_PROPINSI' => 'Nm Propinsi',
        ];
    }
}
