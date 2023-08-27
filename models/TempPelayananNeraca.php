<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_pelayanan_neraca".
 *
 * @property string $NOP
 * @property string $NO_PELAYANAN
 * @property string $KD
 * @property string $KETERANGAN
 * @property string $CATATAN
 */
class TempPelayananNeraca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temp_pelayanan_neraca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOP'], 'required'],
            [['KETERANGAN', 'CATATAN'], 'string'],
            [['NOP'], 'string', 'max' => 18],
            [['NO_PELAYANAN'], 'string', 'max' => 13],
            [['KD'], 'string', 'max' => 20],
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
            'NO_PELAYANAN' => 'No Pelayanan',
            'KD' => 'Kd',
            'KETERANGAN' => 'Keterangan',
            'CATATAN' => 'Catatan',
        ];
    }
}
