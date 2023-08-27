<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_neraca_kpp".
 *
 * @property string $NOP
 * @property string $NAMA
 * @property string $KETETAPAN
 * @property string $POKOK_BAYAR
 * @property string $DENDA_BAYAR
 * @property string $TGL_BAYAR
 * @property string $SISA_PIUTANG
 * @property string $PENYISIHAN
 * @property string $NETTO
 */
class TempNeracaKpp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_neraca_kpp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KETETAPAN', 'POKOK_BAYAR', 'DENDA_BAYAR', 'SISA_PIUTANG', 'PENYISIHAN', 'NETTO'], 'number'],
            [['TGL_BAYAR'], 'string'],
            [['NOP'], 'string', 'max' => 18],
            [['NAMA'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NOP' => 'Nop',
            'NAMA' => 'Nama',
            'KETETAPAN' => 'Ketetapan',
            'POKOK_BAYAR' => 'Pokok  Bayar',
            'DENDA_BAYAR' => 'Denda  Bayar',
            'TGL_BAYAR' => 'Tgl  Bayar',
            'SISA_PIUTANG' => 'Sisa  Piutang',
            'PENYISIHAN' => 'Penyisihan',
            'NETTO' => 'Netto',
        ];
    }
}
