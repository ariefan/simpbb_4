<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dat_jpb13".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $NO_BNG
 * @property string $KLS_JPB13
 * @property string $JML_JPB13
 * @property string $LUAS_JPB13_DGN_AC_SENT
 * @property string $LUAS_JPB13_LAIN_DGN_AC_SENT
 */
class DatJpb13 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dat_jpb13';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'string'],
            [['NO_BNG'], 'integer'],
            [['JML_JPB13', 'LUAS_JPB13_DGN_AC_SENT', 'LUAS_JPB13_LAIN_DGN_AC_SENT'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'KLS_JPB13'], 'string', 'max' => 1],
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
            'KLS_JPB13' => 'Kls Jpb13',
            'JML_JPB13' => 'Jml Jpb13',
            'LUAS_JPB13_DGN_AC_SENT' => 'Luas Jpb13 Dgn Ac Sent',
            'LUAS_JPB13_LAIN_DGN_AC_SENT' => 'Luas Jpb13 Lain Dgn Ac Sent',
        ];
    }
}
