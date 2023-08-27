<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_dusun".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_DUSUN
 * @property string $NM_DUSUN
 * @property string $NAMA
 * @property string $JABATAN
 * @property string $NO_TELP
 */
class RefDusun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $NM_KELURAHAN;

    public static function tableName()
    {
        return 'ref_dusun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_DUSUN'], 'required'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_DUSUN'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN'], 'string', 'max' => 3],
            [['NM_DUSUN', 'NAMA', 'JABATAN', 'NO_TELP'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KD_PROPINSI' => 'Kd  Propinsi',
            'KD_DATI2' => 'Kd  Dati2',
            'KD_KECAMATAN' => 'Kd  Kecamatan',
            'KD_KELURAHAN' => 'Kd  Kelurahan',
            'KD_DUSUN' => 'Kd  Dusun',
            'NM_DUSUN' => 'Nm  Dusun',
            'NAMA' => 'Nama',
            'JABATAN' => 'Jabatan',
            'NO_TELP' => 'No  Telp',
        ];
    }

    public function getKelurahan()
    {
        return $this->hasOne(RefKelurahan::className(),['KD_PROPINSI' => 'KD_PROPINSI', 'KD_DATI2' => 'KD_DATI2', 'KD_KECAMATAN' => 'KD_KECAMATAN','KD_KELURAHAN' => 'KD_KELURAHAN']);
    }
}
