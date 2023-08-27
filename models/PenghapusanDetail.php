<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penghapusan_detail".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property int $JENIS_PENGHAPUSAN
 * @property string $NAMA_WP
 * @property string $ALAMAT_WP
 * @property string $ALAMAT_OP
 * @property int $LUAS_BUMI
 * @property int $LUAS_BNG
 * @property int $NJOP_BUMI
 * @property int $NJOP_BNG
 * @property string $TGL_JATUH_TEMPO
 * @property int $PBB_TERHUTANG
 * @property string $USER_HAPUS
 * @property string $NIP_HAPUS
 * @property string $TGL_HAPUS
 * @property int $TAHAP
 */
class PenghapusanDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penghapusan_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'], 'required'],
            [['JENIS_PENGHAPUSAN', 'LUAS_BUMI', 'LUAS_BNG', 'NJOP_BUMI', 'NJOP_BNG', 'PBB_TERHUTANG', 'TAHAP'], 'integer'],
            [['TGL_JATUH_TEMPO', 'TGL_HAPUS'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT', 'THN_PAJAK_SPPT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NAMA_WP', 'ALAMAT_WP', 'ALAMAT_OP', 'USER_HAPUS', 'NIP_HAPUS'], 'string', 'max' => 500],
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
            'JENIS_PENGHAPUSAN' => 'Jenis Penghapusan',
            'NAMA_WP' => 'Nama Wp',
            'ALAMAT_WP' => 'Alamat Wp',
            'ALAMAT_OP' => 'Alamat Op',
            'LUAS_BUMI' => 'Luas Bumi',
            'LUAS_BNG' => 'Luas Bng',
            'NJOP_BUMI' => 'Njop Bumi',
            'NJOP_BNG' => 'Njop Bng',
            'TGL_JATUH_TEMPO' => 'Tgl Jatuh Tempo',
            'PBB_TERHUTANG' => 'Pbb Terhutang',
            'USER_HAPUS' => 'User Hapus',
            'NIP_HAPUS' => 'Nip Hapus',
            'TGL_HAPUS' => 'Tgl Hapus',
            'TAHAP' => 'Tahap',
        ];
    }
}
