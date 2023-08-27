<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sppt_op_bersama".
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
 * @property string $THN_AWAL_KLS_TANAH
 * @property string $KD_KLS_BNG
 * @property string $THN_AWAL_KLS_BNG
 * @property int $LUAS_BUMI_BEBAN_SPPT
 * @property int $LUAS_BNG_BEBAN_SPPT
 * @property int $NJOP_BUMI_BEBAN_SPPT
 * @property int $NJOP_BNG_BEBAN_SPPT
 */
class SpptOpBersama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sppt_op_bersama';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'KD_KLS_TANAH', 'THN_AWAL_KLS_TANAH', 'KD_KLS_BNG', 'THN_AWAL_KLS_BNG', 'LUAS_BUMI_BEBAN_SPPT', 'LUAS_BNG_BEBAN_SPPT', 'NJOP_BUMI_BEBAN_SPPT', 'NJOP_BNG_BEBAN_SPPT'], 'required'],
            [['LUAS_BUMI_BEBAN_SPPT', 'LUAS_BNG_BEBAN_SPPT', 'NJOP_BUMI_BEBAN_SPPT', 'NJOP_BNG_BEBAN_SPPT'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'KD_KLS_TANAH', 'KD_KLS_BNG'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_PAJAK_SPPT', 'THN_AWAL_KLS_TANAH', 'THN_AWAL_KLS_BNG'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
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
            'THN_AWAL_KLS_TANAH' => 'Thn Awal Kls Tanah',
            'KD_KLS_BNG' => 'Kd Kls Bng',
            'THN_AWAL_KLS_BNG' => 'Thn Awal Kls Bng',
            'LUAS_BUMI_BEBAN_SPPT' => 'Luas Bumi Beban Sppt',
            'LUAS_BNG_BEBAN_SPPT' => 'Luas Bng Beban Sppt',
            'NJOP_BUMI_BEBAN_SPPT' => 'Njop Bumi Beban Sppt',
            'NJOP_BNG_BEBAN_SPPT' => 'Njop Bng Beban Sppt',
        ];
    }
}
