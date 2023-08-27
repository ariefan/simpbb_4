<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_perubahan_jthtempo_sppt".
 *
 * @property int $ID
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $THN_PAJAK_SPPT
 * @property string $TGL_JATUH_TEMPO_SPPT
 * @property string $TGL_JATUH_TEMPO_SPPT_NEW
 * @property string $ALASAN_PERUBAHAN
 * @property string $NIP_PENCATAT_PERUBAHAN
 */
class LogPerubahanJthtempoSppt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_perubahan_jthtempo_sppt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'required'],
            [['THN_PAJAK_SPPT'], 'integer'],
            [['TGL_JATUH_TEMPO_SPPT', 'TGL_JATUH_TEMPO_SPPT_NEW'], 'safe'],
            [['ALASAN_PERUBAHAN'], 'string'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NIP_PENCATAT_PERUBAHAN'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
            'KD_BLOK' => 'Kd Blok',
            'NO_URUT' => 'No Urut',
            'KD_JNS_OP' => 'Kd Jns Op',
            'THN_PAJAK_SPPT' => 'Thn Pajak Sppt',
            'TGL_JATUH_TEMPO_SPPT' => 'Tgl Jatuh Tempo Sppt',
            'TGL_JATUH_TEMPO_SPPT_NEW' => 'Tgl Jatuh Tempo Sppt New',
            'ALASAN_PERUBAHAN' => 'Alasan Perubahan',
            'NIP_PENCATAT_PERUBAHAN' => 'Nip Pencatat Perubahan',
        ];
    }
}
