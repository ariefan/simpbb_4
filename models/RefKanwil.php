<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_kanwil".
 *
 * @property string $KD_KANWIL
 * @property string $NM_KANWIL
 * @property string $AL_KANWIL
 * @property string $KOTA_TERBIT_KANWIL
 * @property string $NO_FAKSIMILI
 * @property string $NO_TELPON
 */
class RefKanwil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kanwil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_KANWIL', 'NM_KANWIL', 'AL_KANWIL', 'KOTA_TERBIT_KANWIL'], 'required'],
            [['KD_KANWIL'], 'string', 'max' => 2],
            [['NM_KANWIL', 'KOTA_TERBIT_KANWIL'], 'string', 'max' => 30],
            [['AL_KANWIL', 'NO_FAKSIMILI', 'NO_TELPON'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_KANWIL' => 'Kd Kanwil',
            'NM_KANWIL' => 'Nm Kanwil',
            'AL_KANWIL' => 'Al Kanwil',
            'KOTA_TERBIT_KANWIL' => 'Kota Terbit Kanwil',
            'NO_FAKSIMILI' => 'No Faksimili',
            'NO_TELPON' => 'No Telpon',
        ];
    }
}
