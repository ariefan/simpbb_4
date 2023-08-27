<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bphtb_dokumen_terlampir".
 *
 * @property int $ID
 * @property string $NAMA
 */
class BphtbDokumenTerlampir extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bphtb_dokumen_terlampir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAMA'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NAMA' => 'Nama',
        ];
    }
}
