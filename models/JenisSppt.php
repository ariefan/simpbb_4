<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_sppt".
 *
 * @property int $id
 * @property string $name
 * @property int $tarif_khusus
 */
class JenisSppt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_sppt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tarif_khusus'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'tarif_khusus' => 'Tarif Khusus',
        ];
    }
}
