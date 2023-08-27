<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fas_non_dep".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_NON_DEP
 * @property string $KD_FASILITAS
 * @property string $NILAI_NON_DEP
 */
class FasNonDep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fas_non_dep';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_NON_DEP', 'KD_FASILITAS'], 'required'],
            [['NILAI_NON_DEP'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_FASILITAS'], 'string', 'max' => 2],
            [['THN_NON_DEP'], 'string', 'max' => 4],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_NON_DEP', 'KD_FASILITAS'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_NON_DEP', 'KD_FASILITAS']],
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
            'THN_NON_DEP' => 'Thn Non Dep',
            'KD_FASILITAS' => 'Kd Fasilitas',
            'NILAI_NON_DEP' => 'Nilai Non Dep',
        ];
    }
}
