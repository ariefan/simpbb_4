<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tower_pekerjaan".
 *
 * @property int $KD_PEKERJAAN
 * @property string $JENIS_PEKERJAAN
 * @property string $NM_PEKERJAAN
 * @property string $SATUAN
 * @property int $HARGA
 */
class TowerPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tower_pekerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['HARGA'], 'integer'],
            [['JENIS_PEKERJAAN'], 'string', 'max' => 20],
            [['NM_PEKERJAAN'], 'string', 'max' => 50],
            [['SATUAN'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PEKERJAAN' => 'Kd Pekerjaan',
            'JENIS_PEKERJAAN' => 'Jenis Pekerjaan',
            'NM_PEKERJAAN' => 'Nm Pekerjaan',
            'SATUAN' => 'Satuan',
            'HARGA' => 'Harga',
        ];
    }
}
