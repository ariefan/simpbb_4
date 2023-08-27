<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran_sppt_catatan".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property int $SEQUENCE_ID
 * @property string $ACCESS_TOKENS
 * @property string $KODE_CABANG
 * @property string $KODE_USER
 * @property string $NO_BUKTI
 * @property string $CATATAN
 * @property int $REVERSAL
 * @property string $CREATED
 */
class PembayaranSpptCatatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayaran_sppt_catatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'SEQUENCE_ID'], 'required'],
            [['SEQUENCE_ID', 'REVERSAL'], 'integer'],
            [['CREATED'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_PAJAK_SPPT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['ACCESS_TOKENS', 'KODE_CABANG', 'KODE_USER', 'NO_BUKTI', 'CATATAN'], 'string', 'max' => 100],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'SEQUENCE_ID'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'SEQUENCE_ID']],
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
            'SEQUENCE_ID' => 'Sequence ID',
            'ACCESS_TOKENS' => 'Access Tokens',
            'KODE_CABANG' => 'Kode Cabang',
            'KODE_USER' => 'Kode User',
            'NO_BUKTI' => 'No Bukti',
            'CATATAN' => 'Catatan',
            'REVERSAL' => 'Reversal',
            'CREATED' => 'Created',
        ];
    }
}
