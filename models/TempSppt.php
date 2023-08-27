<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_sppt".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property string $NM_WP_SPPT
 * @property int $LUAS_BUMI_SPPT
 * @property int $LUAS_BNG_SPPT
 * @property string $DENDA
 * @property string $TOTAL
 * @property int $PBB_YG_HARUS_DIBAYAR_SPPT
 * @property int $ADA
 */
class TempSppt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temp_sppt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'required'],
            [['LUAS_BUMI_SPPT', 'LUAS_BNG_SPPT', 'PBB_YG_HARUS_DIBAYAR_SPPT', 'ADA'], 'integer'],
            [['DENDA', 'TOTAL'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_PAJAK_SPPT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NM_WP_SPPT'], 'string', 'max' => 30],
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
            'NM_WP_SPPT' => 'Nm Wp Sppt',
            'LUAS_BUMI_SPPT' => 'Luas Bumi Sppt',
            'LUAS_BNG_SPPT' => 'Luas Bng Sppt',
            'DENDA' => 'Denda',
            'TOTAL' => 'Total',
            'PBB_YG_HARUS_DIBAYAR_SPPT' => 'Pbb Yg Harus Dibayar Sppt',
            'ADA' => 'Ada',
        ];
    }
}
