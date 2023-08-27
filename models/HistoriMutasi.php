<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "histori_mutasi".
 *
 * @property string $no_pelayanan
 * @property string $nop_sebelum
 * @property string $nama_sebelum
 * @property int $lt_sebelum
 * @property int $lb_sebelum
 * @property int $pbb_sebelum
 * @property string $nop_sesudah
 * @property string $nama_sesudah
 * @property int $lt_sesudah
 * @property int $lb_sesudah
 * @property int $pbb_sesudah
 * @property int $id
 * @property string $keterangan
 */
class HistoriMutasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'histori_mutasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_pelayanan'], 'required'],
            [['lt_sebelum', 'lb_sebelum', 'pbb_sebelum', 'lt_sesudah', 'lb_sesudah', 'pbb_sesudah'], 'integer'],
            [['keterangan'], 'string'],
            [['no_pelayanan'], 'string', 'max' => 50],
            [['nop_sebelum'], 'string', 'max' => 20],
            [['nama_sebelum', 'nama_sesudah'], 'string', 'max' => 200],
            [['nop_sesudah'], 'string', 'max' => 18],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_pelayanan' => 'No Pelayanan',
            'nop_sebelum' => 'Nop Sebelum',
            'nama_sebelum' => 'Nama Sebelum',
            'lt_sebelum' => 'Lt Sebelum',
            'lb_sebelum' => 'Lb Sebelum',
            'pbb_sebelum' => 'Pbb Sebelum',
            'nop_sesudah' => 'Nop Sesudah',
            'nama_sesudah' => 'Nama Sesudah',
            'lt_sesudah' => 'Lt Sesudah',
            'lb_sesudah' => 'Lb Sesudah',
            'pbb_sesudah' => 'Pbb Sesudah',
            'id' => 'ID',
            'keterangan' => 'Keterangan',
        ];
    }
}
