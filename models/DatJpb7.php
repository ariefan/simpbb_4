<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_jpb7".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $NO_BNG
 * @property string $JNS_JPB7
 * @property string $BINTANG_JPB7
 * @property string $JML_KMR_JPB7
 * @property string $LUAS_KMR_JPB7_DGN_AC_SENT
 * @property string $LUAS_KMR_LAIN_JPB7_DGN_AC_SENT
 */
class DatJpb7 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_jpb7';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'string'],
            [['NO_BNG'], 'integer'],
            [['JML_KMR_JPB7', 'LUAS_KMR_JPB7_DGN_AC_SENT', 'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'JNS_JPB7', 'BINTANG_JPB7'], 'string', 'max' => 1],
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
            'JNS_JPB7' => 'Jns Jpb7',
            'BINTANG_JPB7' => 'Bintang Jpb7',
            'JML_KMR_JPB7' => 'Jml Kmr Jpb7',
            'LUAS_KMR_JPB7_DGN_AC_SENT' => 'Luas Kmr Jpb7 Dgn Ac Sent',
            'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT' => 'Luas Kmr Lain Jpb7 Dgn Ac Sent',
        ];
    }
}
