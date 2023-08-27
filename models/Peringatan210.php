<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peringatan210".
 *
 * @property string $NOP
 * @property string $ALAMAT OBJEK PAJAK
 * @property string $NAMA WAJIB PAJAK
 * @property double $PBB
 */
class Peringatan210 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peringatan210';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PBB'], 'number'],
            [['NOP', 'ALAMAT OBJEK PAJAK', 'NAMA WAJIB PAJAK'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NOP' => 'Nop',
            'ALAMAT OBJEK PAJAK' => 'Alamat Objek Pajak',
            'NAMA WAJIB PAJAK' => 'Nama Wajib Pajak',
            'PBB' => 'Pbb',
        ];
    }
}
