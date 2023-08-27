<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_kppbb".
 *
 * @property string $KD_KANWIL
 * @property string $KD_KPPBB
 * @property string $NM_KPPBB
 * @property string $AL_KPPBB
 * @property string $KOTA_TERBIT_KPPBB
 * @property string $NO_FAKSIMILI
 * @property string $NO_TELPON
 */
class RefKppbb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kppbb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_KANWIL', 'KD_KPPBB', 'NM_KPPBB', 'AL_KPPBB', 'KOTA_TERBIT_KPPBB'], 'required'],
            [['KD_KANWIL', 'KD_KPPBB'], 'string', 'max' => 2],
            [['NM_KPPBB', 'KOTA_TERBIT_KPPBB'], 'string', 'max' => 30],
            [['AL_KPPBB', 'NO_FAKSIMILI', 'NO_TELPON'], 'string', 'max' => 50],
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
            'NM_KPPBB' => 'Nm Kppbb',
            'AL_KPPBB' => 'Al Kppbb',
            'KOTA_TERBIT_KPPBB' => 'Kota Terbit Kppbb',
            'NO_FAKSIMILI' => 'No Faksimili',
            'NO_TELPON' => 'No Telpon',
        ];
    }
}
