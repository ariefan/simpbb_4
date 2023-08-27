<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_laporan_keberatan".
 *
 * @property string $NO_PELAYANAN
 * @property string $KETERANGAN
 * @property string $CATATAN
 * @property string $NAMA_SEBELUM
 * @property string $NOP_SEBELUM
 * @property string $LT_SEBELUM
 * @property string $LB_SEBELUM
 * @property string $KETETAPAN_LAMA
 * @property string $NAMA_BARU
 * @property string $NOP_BARU
 * @property string $LT_BARU
 * @property string $LB_BARU
 * @property string $KETETAPAN_BARU
 * @property string $SELISIH_KETETAPAN
 */
class TempLaporanPelayanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_laporan_pelayanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NO_PELAYANAN'], 'required'],
            [['KETERANGAN', 'CATATAN','KD'], 'string'],
            [['TGL'], 'safe'],
            [['LT_SEBELUM', 'LB_SEBELUM', 'KETETAPAN_LAMA', 'LT_BARU', 'LB_BARU', 'KETETAPAN_BARU', 'SELISIH_KETETAPAN'], 'integer'],
            [['NO_PELAYANAN'], 'string', 'max' => 13],
            [['NAMA_SEBELUM'], 'string', 'max' => 50],
            [['NOP_SEBELUM', 'NOP_BARU'], 'string', 'max' => 24],
            [['NAMA_BARU'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NO_PELAYANAN' => 'No  Pelayanan',
            'TGL' => 'Tanggal Pelayanan',
            'KD' => 'Kode Pelayanan',
            'KETERANGAN' => 'Keterangan',
            'CATATAN' => 'Catatan',
            'NAMA_SEBELUM' => 'Nama  Sebelum',
            'NOP_SEBELUM' => 'Nop  Sebelum',
            'LT_SEBELUM' => 'Lt  Sebelum',
            'LB_SEBELUM' => 'Lb  Sebelum',
            'KETETAPAN_LAMA' => 'Ketetapan  Lama',
            'NAMA_BARU' => 'Nama  Baru',
            'NOP_BARU' => 'Nop  Baru',
            'LT_BARU' => 'Lt  Baru',
            'LB_BARU' => 'Lb  Baru',
            'KETETAPAN_BARU' => 'Ketetapan  Baru',
            'SELISIH_KETETAPAN' => 'Selisih  Ketetapan',
        ];
    }
}
