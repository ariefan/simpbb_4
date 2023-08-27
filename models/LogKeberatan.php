<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_keberatan".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $TAHUN_PAJAK_SPPT
 * @property string $ALASAN_KEBERATAN
 * @property string $TANGGAL_ENTRY
 * @property string $USER_ENTRY
 * @property int $LUAS_BUMI_SPPT
 * @property int $LUAS_BNG_SPPT
 * @property int $NJOP_BUMI_SPPT
 * @property int $NJOP_BNG_SPPT
 * @property int $NJOPTKP_SPPT
 * @property int $DIBAYAR
 * @property int $KURANG_BAYAR
 * @property string $STATUS_KEBERATAN
 */
class LogKeberatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_keberatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'TAHUN_PAJAK_SPPT'], 'required'],
            [['TAHUN_PAJAK_SPPT', 'LUAS_BUMI_SPPT', 'LUAS_BNG_SPPT', 'NJOP_BUMI_SPPT', 'NJOP_BNG_SPPT', 'NJOPTKP_SPPT', 'DIBAYAR', 'KURANG_BAYAR'], 'integer'],
            [['ALASAN_KEBERATAN'], 'string'],
            [['TANGGAL_ENTRY'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['USER_ENTRY'], 'string', 'max' => 200],
            [['STATUS_KEBERATAN'], 'string', 'max' => 5],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'TAHUN_PAJAK_SPPT'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'TAHUN_PAJAK_SPPT']],
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
            'TAHUN_PAJAK_SPPT' => 'Tahun Pajak Sppt',
            'ALASAN_KEBERATAN' => 'Alasan Keberatan',
            'TANGGAL_ENTRY' => 'Tanggal Entry',
            'USER_ENTRY' => 'User Entry',
            'LUAS_BUMI_SPPT' => 'Luas Bumi Sppt',
            'LUAS_BNG_SPPT' => 'Luas Bng Sppt',
            'NJOP_BUMI_SPPT' => 'Njop Bumi Sppt',
            'NJOP_BNG_SPPT' => 'Njop Bng Sppt',
            'NJOPTKP_SPPT' => 'Njoptkp Sppt',
            'DIBAYAR' => 'Dibayar',
            'KURANG_BAYAR' => 'Kurang Bayar',
            'STATUS_KEBERATAN' => 'Status Keberatan',
        ];
    }
}
