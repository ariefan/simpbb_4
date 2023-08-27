<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bri_api_log".
 *
 * @property int $ID
 * @property string $METHOD
 * @property string $PARAMETER
 * @property string $RESPONSE
 * @property string $NOTE
 * @property string $DATETIME_HIT
 */
class BriApiLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bri_api_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RESPONSE'], 'string'],
            [['DATETIME_HIT'], 'safe'],
            [['METHOD', 'PARAMETER'], 'string', 'max' => 50],
            [['NOTE'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'METHOD' => 'Method',
            'PARAMETER' => 'Parameter',
            'RESPONSE' => 'Response',
            'NOTE' => 'Note',
            'DATETIME_HIT' => 'Datetime Hit',
        ];
    }
}
