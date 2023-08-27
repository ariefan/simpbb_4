<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank_tunggal".
 *
 * @property string $KD_KANWIL
 * @property string $KD_KPPBB
 * @property string $KD_BANK_TUNGGAL
 * @property string $NM_BANK_TUNGGAL
 * @property string $AL_BANK_TUNGGAL
 * @property string $NO_REK_BANK_TUNGGAL
 */
class BankTunggal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_tunggal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL', 'NM_BANK_TUNGGAL', 'AL_BANK_TUNGGAL'], 'required'],
            [['KD_KANWIL', 'KD_KPPBB', 'KD_BANK_TUNGGAL'], 'string', 'max' => 2],
            [['NM_BANK_TUNGGAL'], 'string', 'max' => 30],
            [['AL_BANK_TUNGGAL'], 'string', 'max' => 50],
            [['NO_REK_BANK_TUNGGAL'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_KANWIL' => 'Kd Kanwil',
            'KD_KPPBB' => 'Kd Kppbb',
            'KD_BANK_TUNGGAL' => 'Kd Bank Tunggal',
            'NM_BANK_TUNGGAL' => 'Nm Bank Tunggal',
            'AL_BANK_TUNGGAL' => 'Al Bank Tunggal',
            'NO_REK_BANK_TUNGGAL' => 'No Rek Bank Tunggal',
        ];
    }
}
