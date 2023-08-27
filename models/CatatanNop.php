<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catatan_nop".
 *
 * @property string $NOP
 * @property string $THN
 * @property string $CATATAN
 */
class CatatanNop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catatan_nop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOP', 'THN'], 'required'],
            [['THN'], 'safe'],
            [['CATATAN'], 'string'],
            [['NOP'], 'string', 'max' => 18],
            [['NOP', 'THN'], 'unique', 'targetAttribute' => ['NOP', 'THN']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NOP' => 'Nop',
            'THN' => 'Thn',
            'CATATAN' => 'Catatan',
        ];
    }
}
