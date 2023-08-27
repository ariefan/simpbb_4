<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_pelayanan".
 *
 * @property string $NO_PELAYANAN
 * @property string $NOP
 * @property string $KD
 * @property string $KETERANGAN
 * @property string $CATATAN
 * @property string $TGL
 */
class TempPelayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temp_pelayanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NO_PELAYANAN'], 'required'],
            [['KETERANGAN', 'CATATAN'], 'string'],
            [['TGL'], 'safe'],
            [['NO_PELAYANAN'], 'string', 'max' => 13],
            [['NOP'], 'string', 'max' => 18],
            [['KD'], 'string', 'max' => 20],
            [['NO_PELAYANAN'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NO_PELAYANAN' => 'No Pelayanan',
            'NOP' => 'Nop',
            'KD' => 'Kd',
            'KETERANGAN' => 'Keterangan',
            'CATATAN' => 'Catatan',
            'TGL' => 'Tgl',
        ];
    }
}
