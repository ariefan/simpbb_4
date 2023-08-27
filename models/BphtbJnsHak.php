<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bphtb_jns_hak".
 *
 * @property string $KODE
 * @property string $NAMA
 */
class BphtbJnsHak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bphtb_jns_hak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KODE'], 'required'],
            [['KODE'], 'string', 'max' => 2],
            [['NAMA'], 'string', 'max' => 50],
            [['KODE'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KODE' => 'Kode',
            'NAMA' => 'Nama',
        ];
    }
}
