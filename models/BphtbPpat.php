<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bphtb_ppat".
 *
 * @property string $KODE
 * @property string $NAMA
 */
class BphtbPpat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bphtb_ppat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KODE'], 'required'],
            [['KODE'], 'string', 'max' => 4],
            [['NAMA'], 'string', 'max' => 100],
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
