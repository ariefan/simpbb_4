<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_akses".
 *
 * @property string $HAK_AKSES
 * @property string $AKSES
 */
class GroupAkses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_akses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['HAK_AKSES', 'AKSES'], 'required'],
            [['HAK_AKSES'], 'string', 'max' => 30],
            [['AKSES'], 'string', 'max' => 50],
            [['HAK_AKSES', 'AKSES'], 'unique', 'targetAttribute' => ['HAK_AKSES', 'AKSES']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'HAK_AKSES' => 'Hak Akses',
            'AKSES' => 'Akses',
        ];
    }
}
