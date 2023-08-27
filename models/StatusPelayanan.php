<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_pelayanan".
 *
 * @property int $id
 * @property string $nama
 * @property int $urutan
 */
class StatusPelayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_pelayanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'urutan'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'urutan' => 'Urutan',
        ];
    }
}
