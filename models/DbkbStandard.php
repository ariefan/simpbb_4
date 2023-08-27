<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_standard".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_STANDARD
 * @property string $KD_JPB
 * @property string $TIPE_BNG
 * @property string $KD_BNG_LANTAI
 * @property string $NILAI_DBKB_STANDARD
 */
class DbkbStandard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_standard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_STANDARD', 'KD_JPB', 'TIPE_BNG', 'KD_BNG_LANTAI'], 'required'],
            [['NILAI_DBKB_STANDARD'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_JPB'], 'string', 'max' => 2],
            [['THN_DBKB_STANDARD'], 'string', 'max' => 4],
            [['TIPE_BNG'], 'string', 'max' => 5],
            [['KD_BNG_LANTAI'], 'string', 'max' => 8],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_STANDARD', 'KD_JPB', 'TIPE_BNG', 'KD_BNG_LANTAI'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_STANDARD', 'KD_JPB', 'TIPE_BNG', 'KD_BNG_LANTAI']],
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
            'THN_DBKB_STANDARD' => 'Thn Dbkb Standard',
            'KD_JPB' => 'Kd Jpb',
            'TIPE_BNG' => 'Tipe Bng',
            'KD_BNG_LANTAI' => 'Kd Bng Lantai',
            'NILAI_DBKB_STANDARD' => 'Nilai Dbkb Standard',
        ];
    }
}
