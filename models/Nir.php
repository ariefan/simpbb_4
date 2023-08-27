<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nir".
 *
 * @property int $ID
 * @property int $TAHUN
 * @property string $NOP
 * @property string $NM_WP
 * @property string $ALAMAT_OP
 * @property string $TANGGAL_PENGAMBILAN_DATA
 * @property int $INFORMASI_HARGA_LAPANGAN
 * @property string $KETERANGAN
 * @property string $SUMBER_INFO
 * @property double $WAKTU
 * @property double $PENAWARAN
 * @property int $LUAS_TANAH
 * @property int $LUAS_BGN
 * @property string $INDIKASI_NILAI_BGN_PER_M2
 * @property string $ADJ_LUAS
 * @property string $ADJ_BENTUK
 * @property string $ADJ_LOKASI
 */
class Nir extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TAHUN', 'INFORMASI_HARGA_LAPANGAN', 'LUAS_TANAH', 'LUAS_BGN'], 'integer'],
            [['TANGGAL_PENGAMBILAN_DATA'], 'safe'],
            [['WAKTU', 'PENAWARAN'], 'number'],
            [['NOP'], 'string', 'max' => 18],
            [['NM_WP'], 'string', 'max' => 30],
            [['ALAMAT_OP'], 'string', 'max' => 50],
            [['KETERANGAN', 'INDIKASI_NILAI_BGN_PER_M2', 'ADJ_LUAS', 'ADJ_BENTUK', 'ADJ_LOKASI'], 'string', 'max' => 10],
            [['SUMBER_INFO'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TAHUN' => 'Tahun',
            'NOP' => 'Nop',
            'NM_WP' => 'Nm Wp',
            'ALAMAT_OP' => 'Alamat Op',
            'TANGGAL_PENGAMBILAN_DATA' => 'Tanggal Pengambilan Data',
            'INFORMASI_HARGA_LAPANGAN' => 'Informasi Harga Lapangan',
            'KETERANGAN' => 'Keterangan',
            'SUMBER_INFO' => 'Sumber Info',
            'WAKTU' => 'Waktu',
            'PENAWARAN' => 'Penawaran',
            'LUAS_TANAH' => 'Luas Tanah',
            'LUAS_BGN' => 'Luas Bgn',
            'INDIKASI_NILAI_BGN_PER_M2' => 'Indikasi Nilai Bgn Per M2',
            'ADJ_LUAS' => 'Adj Luas',
            'ADJ_BENTUK' => 'Adj Bentuk',
            'ADJ_LOKASI' => 'Adj Lokasi',
        ];
    }
}
