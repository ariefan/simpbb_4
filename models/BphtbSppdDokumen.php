<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bphtb_sppd_dokumen".
 *
 * @property string $NO_BPHTB
 * @property int $DOKUMEN_ID
 */
class BphtbSppdDokumen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bphtb_sppd_dokumen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DOKUMEN_ID'], 'integer'],
            [['NO_BPHTB'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NO_BPHTB' => 'No Bphtb',
            'DOKUMEN_ID' => 'Dokumen ID',
        ];
    }
}
