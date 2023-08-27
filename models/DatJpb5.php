<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_jpb5".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $NO_BNG
 * @property string $KLS_JPB5
 * @property string $LUAS_KMR_JPB5_DGN_AC_SENT
 * @property string $LUAS_RNG_LAIN_JPB5_DGN_AC_SENT
 */
class DatJpb5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_jpb5';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'string'],
            [['NO_BNG'], 'integer'],
            [['LUAS_KMR_JPB5_DGN_AC_SENT', 'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'KLS_JPB5'], 'string', 'max' => 1],
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
            'KLS_JPB5' => 'Kls Jpb5',
            'LUAS_KMR_JPB5_DGN_AC_SENT' => 'Luas Kmr Jpb5 Dgn Ac Sent',
            'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT' => 'Luas Rng Lain Jpb5 Dgn Ac Sent',
        ];
    }
}
