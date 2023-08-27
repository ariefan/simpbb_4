<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_material".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_MATERIAL
 * @property string $KD_PEKERJAAN
 * @property string $KD_KEGIATAN
 * @property string $NILAI_DBKB_MATERIAL
 */
class DbkbMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_MATERIAL', 'KD_PEKERJAAN', 'KD_KEGIATAN'], 'required'],
            [['NILAI_DBKB_MATERIAL'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_PEKERJAAN', 'KD_KEGIATAN'], 'string', 'max' => 2],
            [['THN_DBKB_MATERIAL'], 'string', 'max' => 4],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_MATERIAL', 'KD_PEKERJAAN', 'KD_KEGIATAN'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_MATERIAL', 'KD_PEKERJAAN', 'KD_KEGIATAN']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'THN_DBKB_MATERIAL' => 'Thn Dbkb Material',
            'KD_PEKERJAAN' => 'Kd Pekerjaan',
            'KD_KEGIATAN' => 'Kd Kegiatan',
            'NILAI_DBKB_MATERIAL' => 'Nilai Dbkb Material',
        ];
    }
}
