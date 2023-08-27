<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sisa_piutang".
 *
 * @property string $THN_NERACA
 * @property string $THN_PIUTANG
 * @property int $TOTAL
 * @property int $PENYISIHAN
 */
class SisaPiutang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sisa_piutang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['THN_NERACA', 'THN_PIUTANG'], 'required'],
            [['THN_NERACA', 'THN_PIUTANG'], 'safe'],
            [['TOTAL', 'PENYISIHAN'], 'integer'],
            [['THN_NERACA', 'THN_PIUTANG'], 'unique', 'targetAttribute' => ['THN_NERACA', 'THN_PIUTANG']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'THN_NERACA' => 'Thn Neraca',
            'THN_PIUTANG' => 'Thn Piutang',
            'TOTAL' => 'Total',
            'PENYISIHAN' => 'Penyisihan',
        ];
    }
}
