<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb3".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB3
 * @property int $LBR_BENT_MIN_DBKB_JPB3
 * @property int $LBR_BENT_MAX_DBKB_JPB3
 * @property int $TING_KOLOM_MIN_DBKB_JPB3
 * @property int $TING_KOLOM_MAX_DBKB_JPB3
 * @property string $NILAI_DBKB_JPB3
 */
class DbkbJpb3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB3', 'LBR_BENT_MIN_DBKB_JPB3', 'LBR_BENT_MAX_DBKB_JPB3', 'TING_KOLOM_MIN_DBKB_JPB3', 'TING_KOLOM_MAX_DBKB_JPB3'], 'required'],
            [['LBR_BENT_MIN_DBKB_JPB3', 'LBR_BENT_MAX_DBKB_JPB3', 'TING_KOLOM_MIN_DBKB_JPB3', 'TING_KOLOM_MAX_DBKB_JPB3'], 'integer'],
            [['NILAI_DBKB_JPB3'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB3'], 'string', 'max' => 4],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB3', 'LBR_BENT_MIN_DBKB_JPB3', 'LBR_BENT_MAX_DBKB_JPB3', 'TING_KOLOM_MIN_DBKB_JPB3', 'TING_KOLOM_MAX_DBKB_JPB3'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB3', 'LBR_BENT_MIN_DBKB_JPB3', 'LBR_BENT_MAX_DBKB_JPB3', 'TING_KOLOM_MIN_DBKB_JPB3', 'TING_KOLOM_MAX_DBKB_JPB3']],
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
            'THN_DBKB_JPB3' => 'Thn Dbkb Jpb3',
            'LBR_BENT_MIN_DBKB_JPB3' => 'Lbr Bent Min Dbkb Jpb3',
            'LBR_BENT_MAX_DBKB_JPB3' => 'Lbr Bent Max Dbkb Jpb3',
            'TING_KOLOM_MIN_DBKB_JPB3' => 'Ting Kolom Min Dbkb Jpb3',
            'TING_KOLOM_MAX_DBKB_JPB3' => 'Ting Kolom Max Dbkb Jpb3',
            'NILAI_DBKB_JPB3' => 'Nilai Dbkb Jpb3',
        ];
    }
}
