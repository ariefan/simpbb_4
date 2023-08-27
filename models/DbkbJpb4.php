<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb4".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB4
 * @property string $KLS_DBKB_JPB4
 * @property int $LANTAI_MIN_JPB4
 * @property int $LANTAI_MAX_JPB4
 * @property int $NILAI_DBKB_JPB4
 */
class DbkbJpb4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb4';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB4', 'KLS_DBKB_JPB4', 'LANTAI_MIN_JPB4', 'LANTAI_MAX_JPB4'], 'required'],
            [['LANTAI_MIN_JPB4', 'LANTAI_MAX_JPB4', 'NILAI_DBKB_JPB4'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB4'], 'string', 'max' => 4],
            [['KLS_DBKB_JPB4'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB4', 'KLS_DBKB_JPB4', 'LANTAI_MIN_JPB4', 'LANTAI_MAX_JPB4'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB4', 'KLS_DBKB_JPB4', 'LANTAI_MIN_JPB4', 'LANTAI_MAX_JPB4']],
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
            'THN_DBKB_JPB4' => 'Thn Dbkb Jpb4',
            'KLS_DBKB_JPB4' => 'Kls Dbkb Jpb4',
            'LANTAI_MIN_JPB4' => 'Lantai Min Jpb4',
            'LANTAI_MAX_JPB4' => 'Lantai Max Jpb4',
            'NILAI_DBKB_JPB4' => 'Nilai Dbkb Jpb4',
        ];
    }
}
