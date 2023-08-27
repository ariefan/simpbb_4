<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_group".
 *
 * @property string $KD_LOOKUP_GROUP
 * @property string $NM_LOOKUP_GROUP
 */
class LookupGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lookup_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_LOOKUP_GROUP'], 'required'],
            [['KD_LOOKUP_GROUP'], 'string', 'max' => 2],
            [['NM_LOOKUP_GROUP'], 'string', 'max' => 50],
            [['KD_LOOKUP_GROUP'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_LOOKUP_GROUP' => 'Kd Lookup Group',
            'NM_LOOKUP_GROUP' => 'Nm Lookup Group',
        ];
    }
}
