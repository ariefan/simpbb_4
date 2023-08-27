<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bpd_kalibrasi".
 *
 * @property string $TANGGAL
 * @property string $NOP
 * @property int $STATUS_UPDATE
 * @property string $TANGGAL_KALIBRASI_SIM
 * @property string $TANGGAL_KALIBRASI_BPD
 */
class BpdKalibrasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bpd_kalibrasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TANGGAL', 'NOP'], 'required'],
            [['TANGGAL', 'TANGGAL_KALIBRASI_SIM', 'TANGGAL_KALIBRASI_BPD'], 'safe'],
            [['STATUS_UPDATE'], 'integer'],
            [['NOP'], 'string', 'max' => 18],
            [['TANGGAL', 'NOP'], 'unique', 'targetAttribute' => ['TANGGAL', 'NOP']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TANGGAL' => 'Tanggal',
            'NOP' => 'Nop',
            'STATUS_UPDATE' => 'Status Update',
            'TANGGAL_KALIBRASI_SIM' => 'Tanggal Kalibrasi Sim',
            'TANGGAL_KALIBRASI_BPD' => 'Tanggal Kalibrasi Bpd',
        ];
    }
}
