<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "piutang_gede".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $TAHUN
 * @property string $ALAMAT WAJIB PAJAK
 * @property string $ALAMAT OBJEK PAJAK
 * @property string $NAMA WAJIB PAJAK
 * @property int $LUAS BUMI
 * @property int $LUAS BNG
 * @property int $PBB
 * @property string $TGL BAYAR 2016
 */
class PiutangGede extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'piutang_gede';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'TAHUN'], 'required'],
            [['TAHUN', 'TGL BAYAR 2016'], 'safe'],
            [['LUAS BUMI', 'LUAS BNG', 'PBB'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['ALAMAT WAJIB PAJAK'], 'string', 'max' => 46],
            [['ALAMAT OBJEK PAJAK'], 'string', 'max' => 116],
            [['NAMA WAJIB PAJAK'], 'string', 'max' => 30],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP']],
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
            'KD_JNS_OP' => 'Kd Jns Op',
            'TAHUN' => 'Tahun',
            'ALAMAT WAJIB PAJAK' => 'Alamat Wajib Pajak',
            'ALAMAT OBJEK PAJAK' => 'Alamat Objek Pajak',
            'NAMA WAJIB PAJAK' => 'Nama Wajib Pajak',
            'LUAS BUMI' => 'Luas Bumi',
            'LUAS BNG' => 'Luas Bng',
            'PBB' => 'Pbb',
            'TGL BAYAR 2016' => 'Tgl Bayar 2016',
        ];
    }
}
