<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbkb_daya_dukung".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DBKB_DAYA_DUKUNG
 * @property string $TYPE_KONSTRUKSI
 * @property int $NILAI_DBKB_DAYA_DUKUNG
 */
class DbkbDayaDukung extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dbkb_daya_dukung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_DAYA_DUKUNG', 'TYPE_KONSTRUKSI'], 'required'],
            [['NILAI_DBKB_DAYA_DUKUNG'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['THN_DBKB_DAYA_DUKUNG'], 'string', 'max' => 4],
            [['TYPE_KONSTRUKSI'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_DAYA_DUKUNG', 'TYPE_KONSTRUKSI'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DBKB_DAYA_DUKUNG', 'TYPE_KONSTRUKSI']],
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
            'THN_DBKB_DAYA_DUKUNG' => 'Thn Dbkb Daya Dukung',
            'TYPE_KONSTRUKSI' => 'Type Konstruksi',
            'NILAI_DBKB_DAYA_DUKUNG' => 'Nilai Dbkb Daya Dukung',
        ];
    }
}
