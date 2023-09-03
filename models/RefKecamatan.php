<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "REF_KECAMATAN".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $NM_KECAMATAN
 */
class RefKecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'NM_KECAMATAN'], 'required'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN'], 'string', 'max' => 3],
            [['NM_KECAMATAN'], 'string', 'max' => 30],
            [['NM_KECAMATAN', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN'], 'unique', 'targetAttribute' => ['NM_KECAMATAN', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN'], 'message' => 'The combination of Kd  Propinsi, Kd  Dati2, Kd  Kecamatan and Nm  Kecamatan has already been taken.'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN'], 'message' => 'The combination of Kd  Propinsi, Kd  Dati2 and Kd  Kecamatan has already been taken.']
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
            'NM_KECAMATAN' => 'Nm  Kecamatan',
        ];
    }

    public function getKecamatanGroup()
    {
        $kecamatan = $this->find()->select("KD_KECAMATAN,NM_KECAMATAN")->asArray()->all();
        $new_kecamatan = [];
        foreach ($kecamatan as $key => $value) {
            $new_kecamatan[$value['KD_KECAMATAN']] = $value['NM_KECAMATAN'];
        }
        return $new_kecamatan;
    }
}
