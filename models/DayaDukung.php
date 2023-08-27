<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "daya_dukung".
 *
 * @property string $TYPE_KONSTRUKSI
 * @property string $DAYA_DUKUNG_LANTAI_MIN_DBKB
 * @property string $DAYA_DUKUNG_LANTAI_MAX_DBKB
 */
class DayaDukung extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'daya_dukung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TYPE_KONSTRUKSI', 'DAYA_DUKUNG_LANTAI_MIN_DBKB', 'DAYA_DUKUNG_LANTAI_MAX_DBKB'], 'required'],
            [['DAYA_DUKUNG_LANTAI_MIN_DBKB', 'DAYA_DUKUNG_LANTAI_MAX_DBKB'], 'number'],
            [['TYPE_KONSTRUKSI'], 'string', 'max' => 1],
            [['TYPE_KONSTRUKSI'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TYPE_KONSTRUKSI' => 'Type Konstruksi',
            'DAYA_DUKUNG_LANTAI_MIN_DBKB' => 'Daya Dukung Lantai Min Dbkb',
            'DAYA_DUKUNG_LANTAI_MAX_DBKB' => 'Daya Dukung Lantai Max Dbkb',
        ];
    }
}
