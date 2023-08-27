<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fas_dep_min_max".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $THN_DEP_MIN_MAX
 * @property string $KD_FASILITAS
 * @property int $KLS_DEP_MIN
 * @property int $KLS_DEP_MAX
 * @property string $NILAI_DEP_MIN_MAX
 */
class FasDepMinMax extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fas_dep_min_max';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DEP_MIN_MAX', 'KD_FASILITAS', 'KLS_DEP_MIN', 'KLS_DEP_MAX'], 'required'],
            [['KLS_DEP_MIN', 'KLS_DEP_MAX'], 'integer'],
            [['NILAI_DEP_MIN_MAX'], 'number'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_FASILITAS'], 'string', 'max' => 2],
            [['THN_DEP_MIN_MAX'], 'string', 'max' => 4],
            [['KD_PROPINSI', 'KD_DATI2', 'THN_DEP_MIN_MAX', 'KD_FASILITAS', 'KLS_DEP_MIN', 'KLS_DEP_MAX'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'THN_DEP_MIN_MAX', 'KD_FASILITAS', 'KLS_DEP_MIN', 'KLS_DEP_MAX']],
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
            'THN_DEP_MIN_MAX' => 'Thn Dep Min Max',
            'KD_FASILITAS' => 'Kd Fasilitas',
            'KLS_DEP_MIN' => 'Kls Dep Min',
            'KLS_DEP_MAX' => 'Kls Dep Max',
            'NILAI_DEP_MIN_MAX' => 'Nilai Dep Min Max',
        ];
    }
}
