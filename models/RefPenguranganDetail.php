<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_pengurangan_detail".
 *
 * @property int $ref_id
 * @property int $urutan
 * @property string $variabel
 * @property double $bobot
 * @property double $persentase_pns
 * @property double $persentase_nonpns
 */
class RefPenguranganDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_pengurangan_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ref_id', 'urutan'], 'integer'],
            [['bobot', 'persentase_pns', 'persentase_nonpns'], 'number'],
            [['variabel'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ref_id' => 'Ref ID',
            'urutan' => 'Urutan',
            'variabel' => 'Variabel',
            'bobot' => 'Bobot',
            'persentase_pns' => 'Persentase Pns',
            'persentase_nonpns' => 'Persentase Nonpns',
        ];
    }
}
