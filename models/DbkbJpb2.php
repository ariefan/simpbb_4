<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb2".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB2
 * @property string $KLS_DBKB_JPB2
 * @property int $LANTAI_MIN_JPB2
 * @property int $LANTAI_MAX_JPB2
 * @property int $NILAI_DBKB_JPB2
 */
class DbkbJpb2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB2', 'KLS_DBKB_JPB2', 'LANTAI_MIN_JPB2', 'LANTAI_MAX_JPB2'], 'required'],
            [['LANTAI_MIN_JPB2', 'LANTAI_MAX_JPB2', 'NILAI_DBKB_JPB2'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB2'], 'string', 'max' => 4],
            [['KLS_DBKB_JPB2'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB2', 'KLS_DBKB_JPB2', 'LANTAI_MIN_JPB2', 'LANTAI_MAX_JPB2'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB2', 'KLS_DBKB_JPB2', 'LANTAI_MIN_JPB2', 'LANTAI_MAX_JPB2']],
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
            'THN_DBKB_JPB2' => 'Thn Dbkb Jpb2',
            'KLS_DBKB_JPB2' => 'Kls Dbkb Jpb2',
            'LANTAI_MIN_JPB2' => 'Lantai Min Jpb2',
            'LANTAI_MAX_JPB2' => 'Lantai Max Jpb2',
            'NILAI_DBKB_JPB2' => 'Nilai Dbkb Jpb2',
        ];
    }
}
