<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_perijinan".
 *
 * @property string $reg_id
 * @property string $perijinan
 * @property string $ijinatasnama
 * @property string $alamatatasnama
 * @property string $lokasi
 * @property string $fungsi
 * @property string $no_nop
 * @property string $nomorijin
 * @property string $jumlahlantai
 * @property string $jumlahunit
 * @property string $tglijin
 * @property string $luasbangunan
 * @property string $luastanah
 * @property string $kondisibangunan
 * @property string $nohppemilik
 * @property string $nohpkuasa
 * @property string $bulan
 * @property string $tahun
 * @property string $status_tanah
 * @property string $buktihak
 * @property string $keterangan
 */
class ServicePerijinan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_perijinan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_id'], 'required'],
            [['alamatatasnama'], 'string'],
            [['tglijin'], 'safe'],
            [['reg_id'], 'string', 'max' => 100],
            [['perijinan', 'ijinatasnama', 'lokasi', 'fungsi', 'no_nop', 'nomorijin', 'jumlahlantai', 'jumlahunit', 'luasbangunan', 'luastanah', 'kondisibangunan', 'nohppemilik', 'nohpkuasa', 'bulan', 'tahun', 'status_tanah', 'buktihak', 'keterangan'], 'string', 'max' => 1000],
            [['reg_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reg_id' => 'Reg ID',
            'perijinan' => 'Perijinan',
            'ijinatasnama' => 'Ijinatasnama',
            'alamatatasnama' => 'Alamatatasnama',
            'lokasi' => 'Lokasi',
            'fungsi' => 'Fungsi',
            'no_nop' => 'No Nop',
            'nomorijin' => 'Nomorijin',
            'jumlahlantai' => 'Jumlahlantai',
            'jumlahunit' => 'Jumlahunit',
            'tglijin' => 'Tglijin',
            'luasbangunan' => 'Luasbangunan',
            'luastanah' => 'Luastanah',
            'kondisibangunan' => 'Kondisibangunan',
            'nohppemilik' => 'Nohppemilik',
            'nohpkuasa' => 'Nohpkuasa',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'status_tanah' => 'Status Tanah',
            'buktihak' => 'Buktihak',
            'keterangan' => 'Keterangan',
        ];
    }
}
