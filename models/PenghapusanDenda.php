<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penghapusan_denda".
 *
 * @property int $PENGHAPUSAN_DENDA_ID
 * @property string $TANGGAL_AWAL
 * @property string $TANGGAL_AKHIR
 * @property int $THN_PAJAK_AWAL
 * @property int $THN_PAJAK_AKHIR
 */
class PenghapusanDenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penghapusan_denda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TANGGAL_AWAL', 'TANGGAL_AKHIR', 'THN_PAJAK_AWAL', 'THN_PAJAK_AKHIR'], 'required'],
            [['TANGGAL_AWAL', 'TANGGAL_AKHIR'], 'safe'],
            [['THN_PAJAK_AWAL', 'THN_PAJAK_AKHIR'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PENGHAPUSAN_DENDA_ID' => 'Penghapusan Denda ID',
            'TANGGAL_AWAL' => 'Tanggal Awal',
            'TANGGAL_AKHIR' => 'Tanggal Akhir',
            'THN_PAJAK_AWAL' => 'Thn Pajak Awal',
            'THN_PAJAK_AKHIR' => 'Thn Pajak Akhir',
        ];
    }
}
