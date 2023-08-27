<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inputdatapasar".
 *
 * @property string $nop
 */
class Inputdatapasar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inputdatapasar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nop'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nop' => 'Nop',
        ];
    }
}
