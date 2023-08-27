<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelayanan_lampiran_kolektif".
 *
 * @property int $ID
 * @property string $NO_PELAYANAN
 * @property string $NOP
 * @property string $NAMA
 * @property string $ALAMAT
 * @property double $LT
 * @property double $LB
 * @property string $KETERANGAN
 */
class PelayananLampiranKolektif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelayanan_lampiran_kolektif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NO_PELAYANAN'], 'required'],
            [['ALAMAT', 'KETERANGAN'], 'string'],
            [['LT', 'LB'], 'number'],
            [['NO_PELAYANAN'], 'string', 'max' => 30],
            [['NOP'], 'string', 'max' => 40],
            [['NAMA'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NO_PELAYANAN' => 'No Pelayanan',
            'NOP' => 'Nop',
            'NAMA' => 'Nama',
            'ALAMAT' => 'Alamat',
            'LT' => 'Lt',
            'LB' => 'Lb',
            'KETERANGAN' => 'Keterangan',
        ];
    }
}
