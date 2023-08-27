<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_builder".
 *
 * @property int $REPORT_ID
 * @property string $REPORT_NAMA
 * @property string $REPORT_QUERY
 * @property string $KETERANGAN
 */
class ReportBuilder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_builder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['REPORT_NAMA'], 'required'],
            [['REPORT_QUERY'], 'string'],
            [['REPORT_NAMA', 'KETERANGAN'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'REPORT_ID' => 'Report ID',
            'REPORT_NAMA' => 'Report Nama',
            'REPORT_QUERY' => 'Report Query',
            'KETERANGAN' => 'Keterangan',
        ];
    }
}
