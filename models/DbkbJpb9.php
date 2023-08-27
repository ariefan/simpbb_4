<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb9".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB9
 * @property string $KLS_DBKB_JPB9
 * @property int $LANTAI_MIN_JPB9
 * @property int $LANTAI_MAX_JPB9
 * @property int $NILAI_DBKB_JPB9
 */
class DbkbJpb9 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb9';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB9', 'KLS_DBKB_JPB9', 'LANTAI_MIN_JPB9', 'LANTAI_MAX_JPB9'], 'required'],
            [['LANTAI_MIN_JPB9', 'LANTAI_MAX_JPB9', 'NILAI_DBKB_JPB9'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB9'], 'string', 'max' => 4],
            [['KLS_DBKB_JPB9'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB9', 'KLS_DBKB_JPB9', 'LANTAI_MIN_JPB9', 'LANTAI_MAX_JPB9'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB9', 'KLS_DBKB_JPB9', 'LANTAI_MIN_JPB9', 'LANTAI_MAX_JPB9']],
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
            'THN_DBKB_JPB9' => 'Thn Dbkb Jpb9',
            'KLS_DBKB_JPB9' => 'Kls Dbkb Jpb9',
            'LANTAI_MIN_JPB9' => 'Lantai Min Jpb9',
            'LANTAI_MAX_JPB9' => 'Lantai Max Jpb9',
            'NILAI_DBKB_JPB9' => 'Nilai Dbkb Jpb9',
        ];
    }
}
