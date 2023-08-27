<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_jpb3".
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
 * @property string $TING_KOLOM_JPB3
 * @property string $LBR_BENT_JPB3
 * @property string $LUAS_MEZZANINE_JPB3
 * @property string $KELILING_DINDING_JPB3
 * @property string $DAYA_DUKUNG_LANTAI_JPB3
 */
class DatJpb3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_jpb3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'string'],
            [['NO_BNG'], 'integer'],
            [['TING_KOLOM_JPB3', 'LBR_BENT_JPB3', 'LUAS_MEZZANINE_JPB3', 'KELILING_DINDING_JPB3', 'DAYA_DUKUNG_LANTAI_JPB3'], 'number'],
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
            'TING_KOLOM_JPB3' => 'Ting Kolom Jpb3',
            'LBR_BENT_JPB3' => 'Lbr Bent Jpb3',
            'LUAS_MEZZANINE_JPB3' => 'Luas Mezzanine Jpb3',
            'KELILING_DINDING_JPB3' => 'Keliling Dinding Jpb3',
            'DAYA_DUKUNG_LANTAI_JPB3' => 'Daya Dukung Lantai Jpb3',
        ];
    }
}
