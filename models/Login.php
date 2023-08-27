<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login".
 *
 * @property int $ID
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $HAK_AKSES
 * @property string $NIP
 * @property string $NAMA
 * @property string $JABATAN
 * @property int $PENANGGUNG_JAWAB_CETAK
 * @property resource $TANDA_TANGAN
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USERNAME', 'HAK_AKSES'], 'required'],
            [['PENANGGUNG_JAWAB_CETAK'], 'integer'],
            [['TANDA_TANGAN'], 'string'],
            [['USERNAME', 'HAK_AKSES'], 'string', 'max' => 20],
            [['PASSWORD'], 'string', 'max' => 32],
            [['NIP'], 'string', 'max' => 30],
            [['NAMA', 'JABATAN'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USERNAME' => 'Username',
            'PASSWORD' => 'Password',
            'HAK_AKSES' => 'Hak Akses',
            'NIP' => 'Nip',
            'NAMA' => 'Nama',
            'JABATAN' => 'Jabatan',
            'PENANGGUNG_JAWAB_CETAK' => 'Penanggung Jawab Cetak',
            'TANDA_TANGAN' => 'Tanda Tangan',
        ];
    }
}
