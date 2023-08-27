<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelayanan_dokumen_temp".
 *
 * @property string $nopel
 * @property string $dok_id
 */
class PelayananDokumenTemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelayanan_dokumen_temp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nopel', 'dok_id'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nopel' => 'Nopel',
            'dok_id' => 'Dok ID',
        ];
    }
}
