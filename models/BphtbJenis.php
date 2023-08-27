<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bphtb_jenis".
 *
 * @property string $KODE
 * @property string $NAMA
 */
class BphtbJenis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bphtb_jenis';
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
