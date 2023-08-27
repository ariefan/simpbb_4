<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_dati2".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $NM_DATI2
 *
 * @property Lspop[] $lspops
 * @property RefPropinsi $kDPROPINSI
 * @property RefKecamatan[] $refKecamatans
 * @property RefKelurahan[] $refKelurahans
 */
class RefDati2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_dati2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'NM_DATI2'], 'required'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['NM_DATI2'], 'string', 'max' => 30],
            [['KD_PROPINSI'], 'exist', 'skipOnError' => true, 'targetClass' => RefPropinsi::className(), 'targetAttribute' => ['KD_PROPINSI' => 'KD_PROPINSI']],
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
            'NM_DATI2' => 'Nm  Dati2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLspops()
    {
        return $this->hasMany(Lspop::className(), ['KD_PROPINSI' => 'KD_PROPINSI', 'KD_DATI2' => 'KD_DATI2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKDPROPINSI()
    {
        return $this->hasOne(RefPropinsi::className(), ['KD_PROPINSI' => 'KD_PROPINSI']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKecamatans()
    {
        return $this->hasMany(RefKecamatan::className(), ['KD_PROPINSI' => 'KD_PROPINSI', 'KD_DATI2' => 'KD_DATI2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKelurahans()
    {
        return $this->hasMany(RefKelurahan::className(), ['KD_PROPINSI' => 'KD_PROPINSI', 'KD_DATI2' => 'KD_DATI2']);
    }
}
