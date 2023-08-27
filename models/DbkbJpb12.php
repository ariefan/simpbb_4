<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb12".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB12
 * @property string $TYPE_DBKB_JPB12
 * @property int $NILAI_DBKB_JPB12
 */
class DbkbJpb12 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb12';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB12', 'TYPE_DBKB_JPB12'], 'required'],
            [['NILAI_DBKB_JPB12'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB12'], 'string', 'max' => 4],
            [['TYPE_DBKB_JPB12'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB12', 'TYPE_DBKB_JPB12'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB12', 'TYPE_DBKB_JPB12']],
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
            'THN_DBKB_JPB12' => 'Thn Dbkb Jpb12',
            'TYPE_DBKB_JPB12' => 'Type Dbkb Jpb12',
            'NILAI_DBKB_JPB12' => 'Nilai Dbkb Jpb12',
        ];
    }
}
