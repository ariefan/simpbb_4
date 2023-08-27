<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_ubah_kelas_bumi".
 *
 * @property int $id
 * @property string $tanggal
 * @property string $nip
 * @property string $nama
 * @property string $username
 */
class RiwayatUbahKelasBumi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_ubah_kelas_bumi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['tanggal'], 'safe'],
            [['nip', 'username'], 'string', 'max' => 100],
            [['nama'], 'string', 'max' => 200],
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
            'tanggal' => 'Tanggal',
            'nip' => 'Nip',
            'nama' => 'Nama',
            'username' => 'Username',
        ];
    }
}
