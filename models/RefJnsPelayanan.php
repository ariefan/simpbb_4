<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_jns_pelayanan".
 *
 * @property string $KD_JNS_PELAYANAN
 * @property string $NM_JENIS_PELAYANAN
 */
class RefJnsPelayanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_jns_pelayanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_JNS_PELAYANAN', 'NM_JENIS_PELAYANAN'], 'required'],
            [['KD_JNS_PELAYANAN'], 'string', 'max' => 2],
            [['NM_JENIS_PELAYANAN'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KD_JNS_PELAYANAN' => 'Kd  Jns  Pelayanan',
            'NM_JENIS_PELAYANAN' => 'Nm  Jenis  Pelayanan',
        ];
    }
}
