<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_mezanin".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_MEZANIN
 * @property int $NILAI_DBKB_MEZANIN
 */
class DbkbMezanin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_mezanin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_MEZANIN'], 'required'],
            [['NILAI_DBKB_MEZANIN'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_MEZANIN'], 'string', 'max' => 4],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_MEZANIN'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_MEZANIN']],
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
            'THN_DBKB_MEZANIN' => 'Thn Dbkb Mezanin',
            'NILAI_DBKB_MEZANIN' => 'Nilai Dbkb Mezanin',
        ];
    }
}
