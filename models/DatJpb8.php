<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_jpb8".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $NO_BNG
 * @property string $TYPE_KONSTRUKSI
 * @property string $TING_KOLOM_JPB8
 * @property string $LBR_BENT_JPB8
 * @property string $LUAS_MEZZANINE_JPB8
 * @property string $KELILING_DINDING_JPB8
 * @property string $DAYA_DUKUNG_LANTAI_JPB8
 */
class DatJpb8 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_jpb8';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'string'],
            [['NO_BNG'], 'integer'],
            [['TING_KOLOM_JPB8', 'LBR_BENT_JPB8', 'LUAS_MEZZANINE_JPB8', 'KELILING_DINDING_JPB8', 'DAYA_DUKUNG_LANTAI_JPB8'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'TYPE_KONSTRUKSI'], 'string', 'max' => 1],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG']],
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
            'NO_BNG' => 'No Bng',
            'TYPE_KONSTRUKSI' => 'Type Konstruksi',
            'TING_KOLOM_JPB8' => 'Ting Kolom Jpb8',
            'LBR_BENT_JPB8' => 'Lbr Bent Jpb8',
            'LUAS_MEZZANINE_JPB8' => 'Luas Mezzanine Jpb8',
            'KELILING_DINDING_JPB8' => 'Keliling Dinding Jpb8',
            'DAYA_DUKUNG_LANTAI_JPB8' => 'Daya Dukung Lantai Jpb8',
        ];
    }
}
