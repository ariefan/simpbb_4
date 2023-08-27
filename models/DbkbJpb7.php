<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb7".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB7
 * @property string $JNS_DBKB_JPB7
 * @property string $BINTANG_DBKB_JPB7
 * @property int $LANTAI_MIN_JPB7
 * @property int $LANTAI_MAX_JPB7
 * @property int $NILAI_DBKB_JPB7
 */
class DbkbJpb7 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb7';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB7', 'JNS_DBKB_JPB7', 'BINTANG_DBKB_JPB7', 'LANTAI_MIN_JPB7', 'LANTAI_MAX_JPB7'], 'required'],
            [['LANTAI_MIN_JPB7', 'LANTAI_MAX_JPB7', 'NILAI_DBKB_JPB7'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB7'], 'string', 'max' => 4],
            [['JNS_DBKB_JPB7', 'BINTANG_DBKB_JPB7'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB7', 'JNS_DBKB_JPB7', 'BINTANG_DBKB_JPB7', 'LANTAI_MIN_JPB7', 'LANTAI_MAX_JPB7'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB7', 'JNS_DBKB_JPB7', 'BINTANG_DBKB_JPB7', 'LANTAI_MIN_JPB7', 'LANTAI_MAX_JPB7']],
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
            'THN_DBKB_JPB7' => 'Thn Dbkb Jpb7',
            'JNS_DBKB_JPB7' => 'Jns Dbkb Jpb7',
            'BINTANG_DBKB_JPB7' => 'Bintang Dbkb Jpb7',
            'LANTAI_MIN_JPB7' => 'Lantai Min Jpb7',
            'LANTAI_MAX_JPB7' => 'Lantai Max Jpb7',
            'NILAI_DBKB_JPB7' => 'Nilai Dbkb Jpb7',
        ];
    }
}
