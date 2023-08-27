<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb5".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB5
 * @property string $KLS_DBKB_JPB5
 * @property int $LANTAI_MIN_JPB5
 * @property int $LANTAI_MAX_JPB5
 * @property int $NILAI_DBKB_JPB5
 */
class DbkbJpb5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb5';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB5', 'KLS_DBKB_JPB5', 'LANTAI_MIN_JPB5', 'LANTAI_MAX_JPB5'], 'required'],
            [['LANTAI_MIN_JPB5', 'LANTAI_MAX_JPB5', 'NILAI_DBKB_JPB5'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB5'], 'string', 'max' => 4],
            [['KLS_DBKB_JPB5'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB5', 'KLS_DBKB_JPB5', 'LANTAI_MIN_JPB5', 'LANTAI_MAX_JPB5'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB5', 'KLS_DBKB_JPB5', 'LANTAI_MIN_JPB5', 'LANTAI_MAX_JPB5']],
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
            'THN_DBKB_JPB5' => 'Thn Dbkb Jpb5',
            'KLS_DBKB_JPB5' => 'Kls Dbkb Jpb5',
            'LANTAI_MIN_JPB5' => 'Lantai Min Jpb5',
            'LANTAI_MAX_JPB5' => 'Lantai Max Jpb5',
            'NILAI_DBKB_JPB5' => 'Nilai Dbkb Jpb5',
        ];
    }
}
