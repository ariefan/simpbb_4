<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_penghapusan".
 *
 * @property int $id
 * @property string $name
 * @property string $keterangan
 * @property string $deskripsi_penghapusan
 */
class JenisPenghapusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_penghapusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['deskripsi_penghapusan'], 'string'],
            [['name', 'keterangan'], 'string', 'max' => 500],
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
            'name' => 'Name',
            'keterangan' => 'Keterangan',
            'deskripsi_penghapusan' => 'Deskripsi Penghapusan',
        ];
    }
}
