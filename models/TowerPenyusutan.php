<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tower_penyusutan".
 *
 * @property int $UMUR
 * @property string $KONDISI
 * @property string $BIAYA_MIN
 * @property string $BIAYA_MAX
 * @property int $NILAI
 */
class TowerPenyusutan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tower_penyusutan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UMUR', 'KONDISI', 'BIAYA_MIN', 'BIAYA_MAX', 'NILAI'], 'required'],
            [['UMUR', 'NILAI'], 'integer'],
            [['BIAYA_MIN', 'BIAYA_MAX'], 'number'],
            [['KONDISI'], 'string', 'max' => 10],
            [['UMUR', 'KONDISI', 'BIAYA_MIN', 'BIAYA_MAX'], 'unique', 'targetAttribute' => ['UMUR', 'KONDISI', 'BIAYA_MIN', 'BIAYA_MAX']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UMUR' => 'Umur',
            'KONDISI' => 'Kondisi',
            'BIAYA_MIN' => 'Biaya Min',
            'BIAYA_MAX' => 'Biaya Max',
            'NILAI' => 'Nilai',
        ];
    }
}
