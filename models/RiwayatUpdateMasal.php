<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_update_masal".
 *
 * @property string $TANGGAL_UPDATE
 * @property string $NIP_PENDATA
 * @property string $NAMA_PENDATA
 * @property double $RG
 * @property string $JENIS_UPDATE
 */
class RiwayatUpdateMasal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_update_masal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TANGGAL_UPDATE', 'NIP_PENDATA', 'NAMA_PENDATA', 'RG'], 'required'],
            [['TANGGAL_UPDATE'], 'safe'],
            [['RG'], 'number'],
            [['NIP_PENDATA'], 'string', 'max' => 30],
            [['NAMA_PENDATA'], 'string', 'max' => 200],
            [['JENIS_UPDATE'], 'string', 'max' => 10],
            [['TANGGAL_UPDATE'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TANGGAL_UPDATE' => 'Tanggal Update',
            'NIP_PENDATA' => 'Nip Pendata',
            'NAMA_PENDATA' => 'Nama Pendata',
            'RG' => 'Rg',
            'JENIS_UPDATE' => 'Jenis Update',
        ];
    }
}
