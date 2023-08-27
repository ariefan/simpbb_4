<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb13".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB13
 * @property string $KLS_DBKB_JPB13
 * @property int $LANTAI_MIN_JPB13
 * @property int $LANTAI_MAX_JPB13
 * @property int $NILAI_DBKB_JPB13
 */
class DbkbJpb13 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb13';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB13', 'KLS_DBKB_JPB13', 'LANTAI_MIN_JPB13', 'LANTAI_MAX_JPB13'], 'required'],
            [['LANTAI_MIN_JPB13', 'LANTAI_MAX_JPB13', 'NILAI_DBKB_JPB13'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB13'], 'string', 'max' => 4],
            [['KLS_DBKB_JPB13'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB13', 'KLS_DBKB_JPB13', 'LANTAI_MIN_JPB13', 'LANTAI_MAX_JPB13'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB13', 'KLS_DBKB_JPB13', 'LANTAI_MIN_JPB13', 'LANTAI_MAX_JPB13']],
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
            'THN_DBKB_JPB13' => 'Thn Dbkb Jpb13',
            'KLS_DBKB_JPB13' => 'Kls Dbkb Jpb13',
            'LANTAI_MIN_JPB13' => 'Lantai Min Jpb13',
            'LANTAI_MAX_JPB13' => 'Lantai Max Jpb13',
            'NILAI_DBKB_JPB13' => 'Nilai Dbkb Jpb13',
        ];
    }
}
