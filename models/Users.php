<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $no_hp
 * @property string $email
 * @property string $nik
 * @property string $auth_key
 * @property string $access_token
 * @property string $alamat
 * @property string $created_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama'], 'required'],
            [['created_at'], 'safe'],
            [['username', 'nama', 'auth_key', 'access_token', 'alamat'], 'string', 'max' => 50],
            [['password', 'no_hp', 'email', 'nik'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'no_hp' => 'No Hp',
            'email' => 'Email',
            'nik' => 'Nik',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'alamat' => 'Alamat',
            'created_at' => 'Created At',
        ];
    }
}
