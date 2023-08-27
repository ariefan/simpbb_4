<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_item".
 *
 * @property string $KD_LOOKUP_GROUP
 * @property string $KD_LOOKUP_ITEM
 * @property string $NM_LOOKUP_ITEM
 */
class LookupItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lookup_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_LOOKUP_GROUP', 'KD_LOOKUP_ITEM'], 'required'],
            [['KD_LOOKUP_GROUP'], 'string', 'max' => 2],
            [['KD_LOOKUP_ITEM'], 'string', 'max' => 1],
            [['NM_LOOKUP_ITEM'], 'string', 'max' => 225],
            [['KD_LOOKUP_GROUP', 'KD_LOOKUP_ITEM'], 'unique', 'targetAttribute' => ['KD_LOOKUP_GROUP', 'KD_LOOKUP_ITEM']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_LOOKUP_GROUP' => 'Kd Lookup Group',
            'KD_LOOKUP_ITEM' => 'Kd Lookup Item',
            'NM_LOOKUP_ITEM' => 'Nm Lookup Item',
        ];
    }
}
