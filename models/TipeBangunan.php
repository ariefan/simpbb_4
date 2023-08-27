<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipe_bangunan".
 *
 * @property string $TIPE_BNG
 * @property string $NM_TIPE_BNG
 * @property int $LUAS_MIN_TIPE_BNG
 * @property int $LUAS_MAX_TIPE_BNG
 * @property string $FAKTOR_PEMBAGI_TIPE_BNG
 */
class TipeBangunan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipe_bangunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TIPE_BNG'], 'required'],
            [['LUAS_MIN_TIPE_BNG', 'LUAS_MAX_TIPE_BNG'], 'integer'],
            [['FAKTOR_PEMBAGI_TIPE_BNG'], 'number'],
            [['TIPE_BNG'], 'string', 'max' => 5],
            [['NM_TIPE_BNG'], 'string', 'max' => 30],
            [['TIPE_BNG'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TIPE_BNG' => 'Tipe Bng',
            'NM_TIPE_BNG' => 'Nm Tipe Bng',
            'LUAS_MIN_TIPE_BNG' => 'Luas Min Tipe Bng',
            'LUAS_MAX_TIPE_BNG' => 'Luas Max Tipe Bng',
            'FAKTOR_PEMBAGI_TIPE_BNG' => 'Faktor Pembagi Tipe Bng',
        ];
    }
}
