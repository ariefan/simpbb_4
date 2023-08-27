<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_api".
 *
 * @property int $id
 * @property string $params
 * @property string $page
 * @property string $access_token
 * @property string $ip_address
 * @property string $created
 */
class LogApi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_api';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['params'], 'string'],
            [['created'], 'safe'],
            [['page', 'access_token', 'ip_address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'params' => 'Params',
            'page' => 'Page',
            'access_token' => 'Access Token',
            'ip_address' => 'Ip Address',
            'created' => 'Created',
        ];
    }
}
