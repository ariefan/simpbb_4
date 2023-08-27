<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "target_pbb".
 *
 * @property string $TAHUN
 * @property int $NILAI
 */
class TargetPbb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'target_pbb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TAHUN'], 'required'],
            [['NILAI'], 'integer'],
            [['TAHUN'], 'string', 'max' => 4],
            [['TAHUN'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TAHUN' => 'Tahun',
            'NILAI' => 'Nilai',
        ];
    }
}
