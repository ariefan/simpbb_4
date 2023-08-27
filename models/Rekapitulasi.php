<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rekapitulasi".
 *
 * @property string $THN_PAJAK_SPPT
 * @property int $JML_OBJEK_PAJAK
 * @property int $LUAS_BUMI_TOTAL
 * @property int $LUAS_BNG_TOTAL
 * @property int $NJOP_BUMI_TOTAL
 * @property int $NJOP_BNG_TOTAL
 * @property int $JUMLAH_PBB_LUNAS
 * @property int $JUMLAH_PBB_BELUM_LUNAS
 * @property int $JUMLAH_PBB_TOTAL
 */
class Rekapitulasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rekapitulasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['THN_PAJAK_SPPT', 'JML_OBJEK_PAJAK', 'LUAS_BUMI_TOTAL', 'LUAS_BNG_TOTAL', 'NJOP_BUMI_TOTAL', 'NJOP_BNG_TOTAL', 'JUMLAH_PBB_LUNAS', 'JUMLAH_PBB_BELUM_LUNAS', 'JUMLAH_PBB_TOTAL'], 'required'],
            [['JML_OBJEK_PAJAK', 'LUAS_BUMI_TOTAL', 'LUAS_BNG_TOTAL', 'NJOP_BUMI_TOTAL', 'NJOP_BNG_TOTAL', 'JUMLAH_PBB_LUNAS', 'JUMLAH_PBB_BELUM_LUNAS', 'JUMLAH_PBB_TOTAL'], 'integer'],
            [['THN_PAJAK_SPPT'], 'string', 'max' => 4],
            [['THN_PAJAK_SPPT'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'THN_PAJAK_SPPT' => 'Thn Pajak Sppt',
            'JML_OBJEK_PAJAK' => 'Jml Objek Pajak',
            'LUAS_BUMI_TOTAL' => 'Luas Bumi Total',
            'LUAS_BNG_TOTAL' => 'Luas Bng Total',
            'NJOP_BUMI_TOTAL' => 'Njop Bumi Total',
            'NJOP_BNG_TOTAL' => 'Njop Bng Total',
            'JUMLAH_PBB_LUNAS' => 'Jumlah Pbb Lunas',
            'JUMLAH_PBB_BELUM_LUNAS' => 'Jumlah Pbb Belum Lunas',
            'JUMLAH_PBB_TOTAL' => 'Jumlah Pbb Total',
        ];
    }
}
