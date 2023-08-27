<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb14".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB14
 * @property int $NILAI_DBKB_JPB14
 */
class DbkbJpb14 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb14';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB14'], 'required'],
            [['NILAI_DBKB_JPB14'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB14'], 'string', 'max' => 4],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB14'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB14']],
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
            'THN_DBKB_JPB14' => 'Thn Dbkb Jpb14',
            'NILAI_DBKB_JPB14' => 'Nilai Dbkb Jpb14',
        ];
    }
}
