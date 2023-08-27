<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "akses".
 *
 * @property string $AKSES
 * @property int $AKTIF
 */
class Akses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['AKSES'], 'required'],
            [['AKTIF'], 'integer'],
            [['AKSES'], 'string', 'max' => 50],
            [['AKSES'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'AKSES' => 'Akses',
            'AKTIF' => 'Aktif',
        ];
    }
}
