<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sppt_simulasi".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property string $KD_KLS_TANAH
 * @property string $KD_KLS_BNG
 * @property int $LUAS_BUMI_SPPT
 * @property int $NJOP_BUMI_SPPT
 * @property int $LUAS_BNG_SPPT
 * @property int $NJOP_BNG_SPPT
 * @property int $NJOP_SPPT
 * @property int $NJOPTKP_SPPT
 * @property string $NJKP_SPPT
 * @property int $PBB_TERHUTANG_SPPT
 * @property int $FAKTOR_PENGURANG_SPPT
 * @property int $PBB_YG_HARUS_DIBAYAR_SPPT
 * @property string $STATUS_PEMBAYARAN_SPPT
 */
class SpptSimulasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sppt_simulasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'KD_KLS_TANAH', 'KD_KLS_BNG', 'LUAS_BUMI_SPPT', 'NJOP_BUMI_SPPT', 'LUAS_BNG_SPPT', 'NJOP_BNG_SPPT', 'NJOP_SPPT', 'NJOPTKP_SPPT', 'PBB_TERHUTANG_SPPT', 'PBB_YG_HARUS_DIBAYAR_SPPT'], 'required'],
            [['THN_PAJAK_SPPT'], 'safe'],
            [['LUAS_BUMI_SPPT', 'NJOP_BUMI_SPPT', 'LUAS_BNG_SPPT', 'NJOP_BNG_SPPT', 'NJOP_SPPT', 'NJOPTKP_SPPT', 'PBB_TERHUTANG_SPPT', 'FAKTOR_PENGURANG_SPPT', 'PBB_YG_HARUS_DIBAYAR_SPPT'], 'integer'],
            [['NJKP_SPPT'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'KD_KLS_TANAH', 'KD_KLS_BNG'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'STATUS_PEMBAYARAN_SPPT'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT']],
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
            'THN_PAJAK_SPPT' => 'Thn Pajak Sppt',
            'KD_KLS_TANAH' => 'Kd Kls Tanah',
            'KD_KLS_BNG' => 'Kd Kls Bng',
            'LUAS_BUMI_SPPT' => 'Luas Bumi Sppt',
            'NJOP_BUMI_SPPT' => 'Njop Bumi Sppt',
            'LUAS_BNG_SPPT' => 'Luas Bng Sppt',
            'NJOP_BNG_SPPT' => 'Njop Bng Sppt',
            'NJOP_SPPT' => 'Njop Sppt',
            'NJOPTKP_SPPT' => 'Njoptkp Sppt',
            'NJKP_SPPT' => 'Njkp Sppt',
            'PBB_TERHUTANG_SPPT' => 'Pbb Terhutang Sppt',
            'FAKTOR_PENGURANG_SPPT' => 'Faktor Pengurang Sppt',
            'PBB_YG_HARUS_DIBAYAR_SPPT' => 'Pbb Yg Harus Dibayar Sppt',
            'STATUS_PEMBAYARAN_SPPT' => 'Status Pembayaran Sppt',
        ];
    }
}
