<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penyusutan".
 *
 * @property int $UMUR_EFEKTIF
 * @property string $KD_RANGE_PENYUSUTAN
 * @property string $KONDISI_BNG_SUSUT
 * @property int $NILAI_PENYUSUTAN
 */
class Penyusutan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyusutan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UMUR_EFEKTIF', 'KD_RANGE_PENYUSUTAN', 'KONDISI_BNG_SUSUT'], 'required'],
            [['UMUR_EFEKTIF', 'NILAI_PENYUSUTAN'], 'integer'],
            [['KD_RANGE_PENYUSUTAN', 'KONDISI_BNG_SUSUT'], 'string', 'max' => 1],
            [['UMUR_EFEKTIF', 'KD_RANGE_PENYUSUTAN', 'KONDISI_BNG_SUSUT'], 'unique', 'targetAttribute' => ['UMUR_EFEKTIF', 'KD_RANGE_PENYUSUTAN', 'KONDISI_BNG_SUSUT']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UMUR_EFEKTIF' => 'Umur Efektif',
            'KD_RANGE_PENYUSUTAN' => 'Kd Range Penyusutan',
            'KONDISI_BNG_SUSUT' => 'Kondisi Bng Susut',
            'NILAI_PENYUSUTAN' => 'Nilai Penyusutan',
        ];
    }
}
