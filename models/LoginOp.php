<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login_op".
 *
 * @property string $NOP
 * @property string $password
 * @property string $last_login
 */
class LoginOp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login_op';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOP'], 'required'],
            [['last_login'], 'safe'],
            [['NOP'], 'string', 'max' => 18],
            [['password'], 'string', 'max' => 50],
            [['NOP'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NOP' => 'Nop',
            'password' => 'Password',
            'last_login' => 'Last Login',
        ];
    }
}
