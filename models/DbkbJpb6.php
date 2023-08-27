<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb6".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB6
 * @property string $KLS_DBKB_JPB6
 * @property int $NILAI_DBKB_JPB6
 */
class DbkbJpb6 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb6';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB6', 'KLS_DBKB_JPB6'], 'required'],
            [['NILAI_DBKB_JPB6'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB6'], 'string', 'max' => 4],
            [['KLS_DBKB_JPB6'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB6', 'KLS_DBKB_JPB6'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB6', 'KLS_DBKB_JPB6']],
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
            'THN_DBKB_JPB6' => 'Thn Dbkb Jpb6',
            'KLS_DBKB_JPB6' => 'Kls Dbkb Jpb6',
            'NILAI_DBKB_JPB6' => 'Nilai Dbkb Jpb6',
        ];
    }
}
