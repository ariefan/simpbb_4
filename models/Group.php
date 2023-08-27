<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property string $HAK_AKSES
 * @property string $KETERANGAN
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['HAK_AKSES'], 'required'],
            [['HAK_AKSES', 'KETERANGAN'], 'string', 'max' => 50],
            [['HAK_AKSES'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'HAK_AKSES' => 'Hak Akses',
            'KETERANGAN' => 'Keterangan',
        ];
    }
}
