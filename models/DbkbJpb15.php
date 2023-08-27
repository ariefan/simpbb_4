<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb15".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB15
 * @property string $JNS_TANGKI_DBKB_JPB15
 * @property string $KAPASITAS_MIN_DBKB_JPB15
 * @property string $KAPASITAS_MAX_DBKB_JPB15
 * @property int $NILAI_DBKB_JPB15
 */
class DbkbJpb15 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb15';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB15', 'JNS_TANGKI_DBKB_JPB15', 'KAPASITAS_MIN_DBKB_JPB15', 'KAPASITAS_MAX_DBKB_JPB15'], 'required'],
            [['KAPASITAS_MIN_DBKB_JPB15', 'KAPASITAS_MAX_DBKB_JPB15'], 'number'],
            [['NILAI_DBKB_JPB15'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB15'], 'string', 'max' => 4],
            [['JNS_TANGKI_DBKB_JPB15'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB15', 'JNS_TANGKI_DBKB_JPB15', 'KAPASITAS_MIN_DBKB_JPB15', 'KAPASITAS_MAX_DBKB_JPB15'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB15', 'JNS_TANGKI_DBKB_JPB15', 'KAPASITAS_MIN_DBKB_JPB15', 'KAPASITAS_MAX_DBKB_JPB15']],
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
            'THN_DBKB_JPB15' => 'Thn Dbkb Jpb15',
            'JNS_TANGKI_DBKB_JPB15' => 'Jns Tangki Dbkb Jpb15',
            'KAPASITAS_MIN_DBKB_JPB15' => 'Kapasitas Min Dbkb Jpb15',
            'KAPASITAS_MAX_DBKB_JPB15' => 'Kapasitas Max Dbkb Jpb15',
            'NILAI_DBKB_JPB15' => 'Nilai Dbkb Jpb15',
        ];
    }
}
