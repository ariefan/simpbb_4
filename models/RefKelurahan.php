<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "REF_KELURAHAN".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_SEKTOR
 * @property string $NM_KELURAHAN
 * @property integer $NO_KELURAHAN
 * @property string $KD_POS_KELURAHAN
 */
class RefKelurahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_kelurahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'NM_KELURAHAN'], 'required'],
            [['NO_KELURAHAN'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_SEKTOR'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN'], 'string', 'max' => 3],
            [['NM_KELURAHAN'], 'string', 'max' => 30],
            [['KD_POS_KELURAHAN'], 'string', 'max' => 5],
            [['NM_KELURAHAN', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN'], 'unique', 'targetAttribute' => ['NM_KELURAHAN', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN'], 'message' => 'The combination of Kd  Propinsi, Kd  Dati2, Kd  Kecamatan, Kd  Kelurahan and Nm  Kelurahan has already been taken.'],
            [['KD_SEKTOR', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN'], 'unique', 'targetAttribute' => ['KD_SEKTOR', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN'], 'message' => 'The combination of Kd  Propinsi, Kd  Dati2, Kd  Kecamatan, Kd  Kelurahan and Kd  Sektor has already been taken.'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN'], 'message' => 'The combination of Kd  Propinsi, Kd  Dati2, Kd  Kecamatan and Kd  Kelurahan has already been taken.']
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
            'KD_SEKTOR' => 'Kd  Sektor',
            'NM_KELURAHAN' => 'Nm  Kelurahan',
            'NO_KELURAHAN' => 'No  Kelurahan',
            'KD_POS_KELURAHAN' => 'Kd  Pos  Kelurahan',
        ];
    }

    public function getKelurahanGroup()
    {
        $kelurahan = $this->find()->select("KD_KECAMATAN,KD_KELURAHAN,NM_KELURAHAN")->asArray()->all();
        $new_kelurahan = [];
        foreach ($kelurahan as $key => $value) {
            $new_kelurahan[$value['KD_KECAMATAN']][$value['KD_KELURAHAN']] = $value['NM_KELURAHAN'];
        }
        return $new_kelurahan;
    }
}
