<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_op_anggota".
 *
 * @property string $KD_PROPINSI_INDUK
 * @property string $KD_DATI2_INDUK
 * @property string $KD_KECAMATAN_INDUK
 * @property string $KD_KELURAHAN_INDUK
 * @property string $KD_BLOK_INDUK
 * @property string $NO_URUT_INDUK
 * @property string $KD_JNS_OP_INDUK
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $LUAS_BUMI_BEBAN
 * @property int $LUAS_BNG_BEBAN
 * @property int $NILAI_SISTEM_BUMI_BEBAN
 * @property int $NILAI_SISTEM_BNG_BEBAN
 * @property int $NJOP_BUMI_BEBAN
 * @property int $NJOP_BNG_BEBAN
 */
class DatOpAnggota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_op_anggota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI_INDUK', 'KD_DATI2_INDUK', 'KD_KECAMATAN_INDUK', 'KD_KELURAHAN_INDUK', 'KD_BLOK_INDUK', 'NO_URUT_INDUK', 'KD_JNS_OP_INDUK', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'required'],
            [['LUAS_BUMI_BEBAN', 'LUAS_BNG_BEBAN', 'NILAI_SISTEM_BUMI_BEBAN', 'NILAI_SISTEM_BNG_BEBAN', 'NJOP_BUMI_BEBAN', 'NJOP_BNG_BEBAN'], 'integer'],
            [['KD_PROPINSI_INDUK', 'KD_DATI2_INDUK', 'KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN_INDUK', 'KD_KELURAHAN_INDUK', 'KD_BLOK_INDUK', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT_INDUK', 'NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP_INDUK', 'KD_JNS_OP'], 'string', 'max' => 1],
            [['KD_PROPINSI_INDUK', 'KD_DATI2_INDUK', 'KD_KECAMATAN_INDUK', 'KD_KELURAHAN_INDUK', 'KD_BLOK_INDUK', 'NO_URUT_INDUK', 'KD_JNS_OP_INDUK', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'unique', 'targetAttribute' => ['KD_PROPINSI_INDUK', 'KD_DATI2_INDUK', 'KD_KECAMATAN_INDUK', 'KD_KELURAHAN_INDUK', 'KD_BLOK_INDUK', 'NO_URUT_INDUK', 'KD_JNS_OP_INDUK', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PROPINSI_INDUK' => 'Kd Propinsi Induk',
            'KD_DATI2_INDUK' => 'Kd Dati2 Induk',
            'KD_KECAMATAN_INDUK' => 'Kd Kecamatan Induk',
            'KD_KELURAHAN_INDUK' => 'Kd Kelurahan Induk',
            'KD_BLOK_INDUK' => 'Kd Blok Induk',
            'NO_URUT_INDUK' => 'No Urut Induk',
            'KD_JNS_OP_INDUK' => 'Kd Jns Op Induk',
            'KD_PROPINSI' => 'Kd Propinsi',
            'KD_DATI2' => 'Kd Dati2',
            'KD_KECAMATAN' => 'Kd Kecamatan',
            'KD_KELURAHAN' => 'Kd Kelurahan',
            'KD_BLOK' => 'Kd Blok',
            'NO_URUT' => 'No Urut',
            'KD_JNS_OP' => 'Kd Jns Op',
            'LUAS_BUMI_BEBAN' => 'Luas Bumi Beban',
            'LUAS_BNG_BEBAN' => 'Luas Bng Beban',
            'NILAI_SISTEM_BUMI_BEBAN' => 'Nilai Sistem Bumi Beban',
            'NILAI_SISTEM_BNG_BEBAN' => 'Nilai Sistem Bng Beban',
            'NJOP_BUMI_BEBAN' => 'Njop Bumi Beban',
            'NJOP_BNG_BEBAN' => 'Njop Bng Beban',
        ];
    }
}
