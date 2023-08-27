<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_pengurangan".
 *
 * @property int $id
 * @property string $faktor
 */
class RefPengurangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_pengurangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['faktor'], 'string'],
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
            'faktor' => 'Faktor',
        ];
    }
}
