<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dhr".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $NO_BNG
 * @property string $KD_JPB
 * @property string $NM_WP
 * @property string $ALAMAT_WP
 * @property string $ALAMAT_OP
 * @property int $LUAS_BUMI
 * @property int $LUAS_BNG
 * @property string $KD_ZNT
 * @property string $KELAS_BUMI
 * @property string $KELAS_BNG
 * @property string $JNS_BUMI
 * @property string $JNS_TRANSAKSI
 * @property string $LSPOP_THN_BNG
 * @property string $LSPOP_LISTRIK
 * @property string $LSPOP_JML_LT
 * @property string $LSPOP_THN_RENOV
 * @property string $LSPOP_KONDISI
 * @property string $LSPOP_KONSTRUKSI
 * @property string $LSPOP_ATAP
 * @property string $LSPOP_DINDING
 * @property string $LSPOP_LANTAI
 * @property string $LSPOP_LANGIT
 * @property string $LSPOP_AC_SPLIT
 * @property string $LSPOP_AC_WINDOW
 * @property string $LSPOP_AC_SENTRAL
 * @property string $LSPOP_PAGAR_BAJA
 * @property string $LSPOP_PAGAR_BATA
 * @property string $LSPOP_POOL_PLASTER
 * @property string $LSPOP_POOL_PELAPIS
 * @property string $LSPOP_SUMUR
 * @property int $JML_PAJAK
 */
class Dhr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dhr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG'], 'required'],
            [['NO_BNG', 'LUAS_BUMI', 'LUAS_BNG', 'JML_PAJAK'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_ZNT'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'KD_JPB', 'KELAS_BUMI', 'KELAS_BNG'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'JNS_BUMI', 'JNS_TRANSAKSI'], 'string', 'max' => 1],
            [['NM_WP', 'ALAMAT_WP', 'ALAMAT_OP'], 'string', 'max' => 255],
            [['LSPOP_THN_BNG', 'LSPOP_LISTRIK', 'LSPOP_JML_LT', 'LSPOP_THN_RENOV', 'LSPOP_KONDISI', 'LSPOP_KONSTRUKSI', 'LSPOP_ATAP', 'LSPOP_DINDING', 'LSPOP_LANTAI', 'LSPOP_LANGIT', 'LSPOP_AC_SPLIT', 'LSPOP_AC_WINDOW', 'LSPOP_AC_SENTRAL', 'LSPOP_PAGAR_BAJA', 'LSPOP_PAGAR_BATA', 'LSPOP_POOL_PLASTER', 'LSPOP_POOL_PELAPIS', 'LSPOP_SUMUR'], 'string', 'max' => 100],
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
            'KD_JPB' => 'Kd Jpb',
            'NM_WP' => 'Nm Wp',
            'ALAMAT_WP' => 'Alamat Wp',
            'ALAMAT_OP' => 'Alamat Op',
            'LUAS_BUMI' => 'Luas Bumi',
            'LUAS_BNG' => 'Luas Bng',
            'KD_ZNT' => 'Kd Znt',
            'KELAS_BUMI' => 'Kelas Bumi',
            'KELAS_BNG' => 'Kelas Bng',
            'JNS_BUMI' => 'Jns Bumi',
            'JNS_TRANSAKSI' => 'Jns Transaksi',
            'LSPOP_THN_BNG' => 'Lspop Thn Bng',
            'LSPOP_LISTRIK' => 'Lspop Listrik',
            'LSPOP_JML_LT' => 'Lspop Jml Lt',
            'LSPOP_THN_RENOV' => 'Lspop Thn Renov',
            'LSPOP_KONDISI' => 'Lspop Kondisi',
            'LSPOP_KONSTRUKSI' => 'Lspop Konstruksi',
            'LSPOP_ATAP' => 'Lspop Atap',
            'LSPOP_DINDING' => 'Lspop Dinding',
            'LSPOP_LANTAI' => 'Lspop Lantai',
            'LSPOP_LANGIT' => 'Lspop Langit',
            'LSPOP_AC_SPLIT' => 'Lspop Ac Split',
            'LSPOP_AC_WINDOW' => 'Lspop Ac Window',
            'LSPOP_AC_SENTRAL' => 'Lspop Ac Sentral',
            'LSPOP_PAGAR_BAJA' => 'Lspop Pagar Baja',
            'LSPOP_PAGAR_BATA' => 'Lspop Pagar Bata',
            'LSPOP_POOL_PLASTER' => 'Lspop Pool Plaster',
            'LSPOP_POOL_PELAPIS' => 'Lspop Pool Pelapis',
            'LSPOP_SUMUR' => 'Lspop Sumur',
            'JML_PAJAK' => 'Jml Pajak',
        ];
    }
}
