<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_valid".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $THN_PAJAK_SPPT
 * @property string $KD_JNS_OP
 * @property string $NOP TAHUN
 * @property string $NOP
 * @property int $PBB
 * @property int $TOTAL_DENDA
 * @property int $TOTAL_BAYAR
 * @property string $TGL_BAYAR
 */
class DataValid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_valid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'THN_PAJAK_SPPT'], 'required'],
            [['THN_PAJAK_SPPT', 'TGL_BAYAR'], 'safe'],
            [['PBB', 'TOTAL_DENDA', 'TOTAL_BAYAR'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NOP TAHUN', 'NOP'], 'string', 'max' => 30],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'THN_PAJAK_SPPT'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'THN_PAJAK_SPPT']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
            'KD_BLOK' => 'Kd Blok',
            'NO_URUT' => 'No Urut',
            'THN_PAJAK_SPPT' => 'Thn Pajak Sppt',
            'KD_JNS_OP' => 'Kd Jns Op',
            'NOP TAHUN' => 'Nop Tahun',
            'NOP' => 'Nop',
            'PBB' => 'Pbb',
            'TOTAL_DENDA' => 'Total Denda',
            'TOTAL_BAYAR' => 'Total Bayar',
            'TGL_BAYAR' => 'Tgl Bayar',
        ];
    }
}
