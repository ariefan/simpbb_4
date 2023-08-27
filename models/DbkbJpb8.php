<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_jpb8".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_JPB8
 * @property int $LBR_BENT_MIN_DBKB_JPB8
 * @property int $LBR_BENT_MAX_DBKB_JPB8
 * @property int $TING_KOLOM_MIN_DBKB_JPB8
 * @property int $TING_KOLOM_MAX_DBKB_JPB8
 * @property string $NILAI_DBKB_JPB8
 */
class DbkbJpb8 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_jpb8';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB8', 'LBR_BENT_MIN_DBKB_JPB8', 'LBR_BENT_MAX_DBKB_JPB8', 'TING_KOLOM_MIN_DBKB_JPB8', 'TING_KOLOM_MAX_DBKB_JPB8'], 'required'],
            [['LBR_BENT_MIN_DBKB_JPB8', 'LBR_BENT_MAX_DBKB_JPB8', 'TING_KOLOM_MIN_DBKB_JPB8', 'TING_KOLOM_MAX_DBKB_JPB8'], 'integer'],
            [['NILAI_DBKB_JPB8'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_JPB8'], 'string', 'max' => 4],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB8', 'LBR_BENT_MIN_DBKB_JPB8', 'LBR_BENT_MAX_DBKB_JPB8', 'TING_KOLOM_MIN_DBKB_JPB8', 'TING_KOLOM_MAX_DBKB_JPB8'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_JPB8', 'LBR_BENT_MIN_DBKB_JPB8', 'LBR_BENT_MAX_DBKB_JPB8', 'TING_KOLOM_MIN_DBKB_JPB8', 'TING_KOLOM_MAX_DBKB_JPB8']],
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
            'THN_DBKB_JPB8' => 'Thn Dbkb Jpb8',
            'LBR_BENT_MIN_DBKB_JPB8' => 'Lbr Bent Min Dbkb Jpb8',
            'LBR_BENT_MAX_DBKB_JPB8' => 'Lbr Bent Max Dbkb Jpb8',
            'TING_KOLOM_MIN_DBKB_JPB8' => 'Ting Kolom Min Dbkb Jpb8',
            'TING_KOLOM_MAX_DBKB_JPB8' => 'Ting Kolom Max Dbkb Jpb8',
            'NILAI_DBKB_JPB8' => 'Nilai Dbkb Jpb8',
        ];
    }
}
