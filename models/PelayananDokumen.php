<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelayanan_dokumen".
 *
 * @property int $pelayanan_id
 * @property int $dokumen_id
 */
class PelayananDokumen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelayanan_dokumen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pelayanan_id', 'dokumen_id'], 'required'],
            [['pelayanan_id', 'dokumen_id'], 'integer'],
            [['pelayanan_id', 'dokumen_id'], 'unique', 'targetAttribute' => ['pelayanan_id', 'dokumen_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pelayanan_id' => 'Pelayanan ID',
            'dokumen_id' => 'Dokumen ID',
        ];
    }
}
