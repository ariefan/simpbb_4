<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_pembayaran".
 *
 * @property string $NOP
 * @property string $TOTAL
 * @property string $DENDA
 */
class TempPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temp_pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOP'], 'required'],
            [['TOTAL', 'DENDA'], 'number'],
            [['NOP'], 'string', 'max' => 18],
            [['NOP'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NOP' => 'Nop',
            'TOTAL' => 'Total',
            'DENDA' => 'Denda',
        ];
    }
}
