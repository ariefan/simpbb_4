<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "validasi_copy".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $NM_WP_SPPT
 * @property string $KETERANGAN
 * @property string $TINDAK_LANJUT
 * @property int $IS_CETAK
 * @property int $IS_VALIDATED
 * @property string $KELOMPOK
 * @property int $KATEGORI
 * @property string $VALIDASI_KE
 * @property int $PBB
 * @property string $MODIFIED
 * @property string $JENIS
 */
class ValidasiCopy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'validasi_copy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'required'],
            [['KETERANGAN', 'TINDAK_LANJUT'], 'string'],
            [['IS_CETAK', 'IS_VALIDATED', 'KATEGORI', 'PBB'], 'integer'],
            [['MODIFIED'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NM_WP_SPPT'], 'string', 'max' => 255],
            [['KELOMPOK', 'VALIDASI_KE'], 'string', 'max' => 50],
            [['JENIS'], 'string', 'max' => 100],
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
            'NM_WP_SPPT' => 'Nm Wp Sppt',
            'KETERANGAN' => 'Keterangan',
            'TINDAK_LANJUT' => 'Tindak Lanjut',
            'IS_CETAK' => 'Is Cetak',
            'IS_VALIDATED' => 'Is Validated',
            'KELOMPOK' => 'Kelompok',
            'KATEGORI' => 'Kategori',
            'VALIDASI_KE' => 'Validasi Ke',
            'PBB' => 'Pbb',
            'MODIFIED' => 'Modified',
            'JENIS' => 'Jenis',
        ];
    }
}
