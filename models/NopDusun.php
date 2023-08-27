<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nop_dusun".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property string $KD_DUSUN
 * @property string $NM_WP_SPPT
 * @property int $PBB_YG_HARUS_DIBAYAR_SPPT
 * @property string $STATUS
 * @property string $KETERANGAN
 * @property string $USER_INPUT
 * @property string $LAST_UPDATE
 */
class NopDusun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nop_dusun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'KETERANGAN'], 'required'],
            [['THN_PAJAK_SPPT', 'LAST_UPDATE'], 'safe'],
            [['PBB_YG_HARUS_DIBAYAR_SPPT'], 'integer'],
            [['STATUS'], 'string'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_DUSUN'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NM_WP_SPPT', 'KETERANGAN', 'USER_INPUT'], 'string', 'max' => 255],
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
            'KD_DUSUN' => 'Kd Dusun',
            'NM_WP_SPPT' => 'Nm Wp Sppt',
            'PBB_YG_HARUS_DIBAYAR_SPPT' => 'Pbb Yg Harus Dibayar Sppt',
            'STATUS' => 'Status',
            'KETERANGAN' => 'Keterangan',
            'USER_INPUT' => 'User Input',
            'LAST_UPDATE' => 'Last Update',
        ];
    }
}
