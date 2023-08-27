<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fas_dep_jpb_kls_bintang".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DEP_JPB_KLS_BINTANG
 * @property string $KD_FASILITAS
 * @property string $KD_JPB
 * @property string $KLS_BINTANG
 * @property string $NILAI_FASILITAS_KLS_BINTANG
 */
class FasDepJpbKlsBintang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fas_dep_jpb_kls_bintang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DEP_JPB_KLS_BINTANG', 'KD_FASILITAS', 'KD_JPB', 'KLS_BINTANG'], 'required'],
            [['NILAI_FASILITAS_KLS_BINTANG'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_FASILITAS', 'KD_JPB'], 'string', 'max' => 2],
            [['THN_DEP_JPB_KLS_BINTANG', 'KLS_BINTANG'], 'string', 'max' => 4],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DEP_JPB_KLS_BINTANG', 'KD_FASILITAS', 'KD_JPB', 'KLS_BINTANG'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DEP_JPB_KLS_BINTANG', 'KD_FASILITAS', 'KD_JPB', 'KLS_BINTANG']],
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
            'THN_DEP_JPB_KLS_BINTANG' => 'Thn Dep Jpb Kls Bintang',
            'KD_FASILITAS' => 'Kd Fasilitas',
            'KD_JPB' => 'Kd Jpb',
            'KLS_BINTANG' => 'Kls Bintang',
            'NILAI_FASILITAS_KLS_BINTANG' => 'Nilai Fasilitas Kls Bintang',
        ];
    }
}
