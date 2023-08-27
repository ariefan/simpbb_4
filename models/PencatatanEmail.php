<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pencatatan_email".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $NM_WP_SPPT
 * @property string|null $EMAIL
 * @property string|null $NAMA_PENERIMA
 * @property string|null $KEPEMILIKAN
 * @property string|null $KEPEMILIKAN_LAINNYA
 * @property int|null $PENDATA
 * @property int|null $UPDATE_PENDATA
 * @property string $WAKTU_PENDATA
 * @property string|null $TOKEN
 * @property int|null $IS_VERIFIED
 *
 * @property User $pENDATA
 * @property User $uPDATEPENDATA
 */
class PencatatanEmail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pencatatan_email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NM_WP_SPPT'], 'required'],
            [['KEPEMILIKAN'], 'string'],
            [['PENDATA', 'UPDATE_PENDATA', 'IS_VERIFIED'], 'integer'],
            [['WAKTU_PENDATA','NIK','NO_TELP'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NM_WP_SPPT', 'EMAIL', 'NAMA_PENERIMA'], 'string', 'max' => 500],
            [['KEPEMILIKAN_LAINNYA', 'TOKEN'], 'string', 'max' => 1000],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NM_WP_SPPT'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NM_WP_SPPT']],
            [['PENDATA'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['PENDATA' => 'id']],
            [['UPDATE_PENDATA'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['UPDATE_PENDATA' => 'id']],
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
            'NM_WP_SPPT' => 'Nm Wp Sppt',
            'EMAIL' => 'Email',
            'NAMA_PENERIMA' => 'Nama Penerima',
            'KEPEMILIKAN' => 'Kepemilikan',
            'KEPEMILIKAN_LAINNYA' => 'Kepemilikan Lainnya',
            'PENDATA' => 'Pendata',
            'UPDATE_PENDATA' => 'Update Pendata',
            'WAKTU_PENDATA' => 'Waktu Pendata',
            'TOKEN' => 'Token',
            'IS_VERIFIED' => 'Is Verified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPENDATA()
    {
        return $this->hasOne(User::className(), ['id' => 'PENDATA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUPDATEPENDATA()
    {
        return $this->hasOne(User::className(), ['id' => 'UPDATE_PENDATA']);
    }
}
