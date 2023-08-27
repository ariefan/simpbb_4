<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb16".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB16
 * @property string $KLS_DBKB_JPB16
 * @property int $LANTAI_MIN_JPB16
 * @property int $LANTAI_MAX_JPB16
 * @property int $NILAI_DBKB_JPB16
 */
class DbkbJpb16 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb16';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB16', 'KLS_DBKB_JPB16', 'LANTAI_MIN_JPB16', 'LANTAI_MAX_JPB16'], 'required'],
            [['LANTAI_MIN_JPB16', 'LANTAI_MAX_JPB16', 'NILAI_DBKB_JPB16'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB16'], 'string', 'max' => 4],
            [['KLS_DBKB_JPB16'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB16', 'KLS_DBKB_JPB16', 'LANTAI_MIN_JPB16', 'LANTAI_MAX_JPB16'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB16', 'KLS_DBKB_JPB16', 'LANTAI_MIN_JPB16', 'LANTAI_MAX_JPB16']],
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
            'THN_DBKB_JPB16' => 'Thn Dbkb Jpb16',
            'KLS_DBKB_JPB16' => 'Kls Dbkb Jpb16',
            'LANTAI_MIN_JPB16' => 'Lantai Min Jpb16',
            'LANTAI_MAX_JPB16' => 'Lantai Max Jpb16',
            'NILAI_DBKB_JPB16' => 'Nilai Dbkb Jpb16',
        ];
    }
}
