<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bpk_baru".
 *
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $NAMA
 * @property string $JNS_PELAYANAN
 * @property int $TERHUTANG
 * @property int $TERHUTANG_PERUBAHAN
 * @property int $DENDA
 * @property int $TOTAL
 * @property int $DENDA_1993
 * @property int $POKOK_1993
 * @property int $TUNGGAKAN_1993
 * @property int $DENDA_1994
 * @property int $POKOK_1994
 * @property int $TUNGGAKAN_1994
 * @property int $DENDA_1995
 * @property int $POKOK_1995
 * @property int $TUNGGAKAN_1995
 * @property int $DENDA_1996
 * @property int $POKOK_1996
 * @property int $TUNGGAKAN_1996
 * @property int $DENDA_1997
 * @property int $POKOK_1997
 * @property int $TUNGGAKAN_1997
 * @property int $DENDA_1998
 * @property int $POKOK_1998
 * @property int $TUNGGAKAN_1998
 * @property int $DENDA_1999
 * @property int $POKOK_1999
 * @property int $TUNGGAKAN_1999
 * @property int $DENDA_2000
 * @property int $POKOK_2000
 * @property int $TUNGGAKAN_2000
 * @property int $DENDA_2001
 * @property int $POKOK_2001
 * @property int $TUNGGAKAN_2001
 * @property int $DENDA_2002
 * @property int $POKOK_2002
 * @property int $TUNGGAKAN_2002
 * @property int $DENDA_2003
 * @property int $POKOK_2003
 * @property int $TUNGGAKAN_2003
 * @property int $DENDA_2004
 * @property int $POKOK_2004
 * @property int $TUNGGAKAN_2004
 * @property int $DENDA_2005
 * @property int $POKOK_2005
 * @property int $TUNGGAKAN_2005
 * @property int $DENDA_2006
 * @property int $POKOK_2006
 * @property int $TUNGGAKAN_2006
 * @property int $DENDA_2007
 * @property int $POKOK_2007
 * @property int $TUNGGAKAN_2007
 * @property int $DENDA_2008
 * @property int $POKOK_2008
 * @property int $TUNGGAKAN_2008
 * @property int $DENDA_2009
 * @property int $POKOK_2009
 * @property int $TUNGGAKAN_2009
 * @property int $DENDA_2010
 * @property int $POKOK_2010
 * @property int $TUNGGAKAN_2010
 * @property int $DENDA_2011
 * @property int $POKOK_2011
 * @property int $TUNGGAKAN_2011
 * @property int $DENDA_2012
 * @property int $POKOK_2012
 * @property int $TUNGGAKAN_2012
 * @property int $DENDA_2013
 * @property int $POKOK_2013
 * @property int $TUNGGAKAN_2013
 * @property int $DENDA_2014
 * @property int $POKOK_2014
 * @property int $TUNGGAKAN_2014
 */
class BpkBaru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bpk_baru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NAMA', 'TERHUTANG', 'DENDA', 'TOTAL'], 'required'],
            [['TERHUTANG', 'TERHUTANG_PERUBAHAN', 'DENDA', 'TOTAL', 'DENDA_1993', 'POKOK_1993', 'TUNGGAKAN_1993', 'DENDA_1994', 'POKOK_1994', 'TUNGGAKAN_1994', 'DENDA_1995', 'POKOK_1995', 'TUNGGAKAN_1995', 'DENDA_1996', 'POKOK_1996', 'TUNGGAKAN_1996', 'DENDA_1997', 'POKOK_1997', 'TUNGGAKAN_1997', 'DENDA_1998', 'POKOK_1998', 'TUNGGAKAN_1998', 'DENDA_1999', 'POKOK_1999', 'TUNGGAKAN_1999', 'DENDA_2000', 'POKOK_2000', 'TUNGGAKAN_2000', 'DENDA_2001', 'POKOK_2001', 'TUNGGAKAN_2001', 'DENDA_2002', 'POKOK_2002', 'TUNGGAKAN_2002', 'DENDA_2003', 'POKOK_2003', 'TUNGGAKAN_2003', 'DENDA_2004', 'POKOK_2004', 'TUNGGAKAN_2004', 'DENDA_2005', 'POKOK_2005', 'TUNGGAKAN_2005', 'DENDA_2006', 'POKOK_2006', 'TUNGGAKAN_2006', 'DENDA_2007', 'POKOK_2007', 'TUNGGAKAN_2007', 'DENDA_2008', 'POKOK_2008', 'TUNGGAKAN_2008', 'DENDA_2009', 'POKOK_2009', 'TUNGGAKAN_2009', 'DENDA_2010', 'POKOK_2010', 'TUNGGAKAN_2010', 'DENDA_2011', 'POKOK_2011', 'TUNGGAKAN_2011', 'DENDA_2012', 'POKOK_2012', 'TUNGGAKAN_2012', 'DENDA_2013', 'POKOK_2013', 'TUNGGAKAN_2013', 'DENDA_2014', 'POKOK_2014', 'TUNGGAKAN_2014'], 'integer'],
            [['KD_PROPINSI', 'KD_DATI2'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK'], 'string', 'max' => 3],
            [['NO_URUT'], 'string', 'max' => 4],
            [['KD_JNS_OP'], 'string', 'max' => 1],
            [['NAMA'], 'string', 'max' => 50],
            [['JNS_PELAYANAN'], 'string', 'max' => 5],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP']],
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
            'NAMA' => 'Nama',
            'JNS_PELAYANAN' => 'Jns Pelayanan',
            'TERHUTANG' => 'Terhutang',
            'TERHUTANG_PERUBAHAN' => 'Terhutang Perubahan',
            'DENDA' => 'Denda',
            'TOTAL' => 'Total',
            'DENDA_1993' => 'Denda 1993',
            'POKOK_1993' => 'Pokok 1993',
            'TUNGGAKAN_1993' => 'Tunggakan 1993',
            'DENDA_1994' => 'Denda 1994',
            'POKOK_1994' => 'Pokok 1994',
            'TUNGGAKAN_1994' => 'Tunggakan 1994',
            'DENDA_1995' => 'Denda 1995',
            'POKOK_1995' => 'Pokok 1995',
            'TUNGGAKAN_1995' => 'Tunggakan 1995',
            'DENDA_1996' => 'Denda 1996',
            'POKOK_1996' => 'Pokok 1996',
            'TUNGGAKAN_1996' => 'Tunggakan 1996',
            'DENDA_1997' => 'Denda 1997',
            'POKOK_1997' => 'Pokok 1997',
            'TUNGGAKAN_1997' => 'Tunggakan 1997',
            'DENDA_1998' => 'Denda 1998',
            'POKOK_1998' => 'Pokok 1998',
            'TUNGGAKAN_1998' => 'Tunggakan 1998',
            'DENDA_1999' => 'Denda 1999',
            'POKOK_1999' => 'Pokok 1999',
            'TUNGGAKAN_1999' => 'Tunggakan 1999',
            'DENDA_2000' => 'Denda 2000',
            'POKOK_2000' => 'Pokok 2000',
            'TUNGGAKAN_2000' => 'Tunggakan 2000',
            'DENDA_2001' => 'Denda 2001',
            'POKOK_2001' => 'Pokok 2001',
            'TUNGGAKAN_2001' => 'Tunggakan 2001',
            'DENDA_2002' => 'Denda 2002',
            'POKOK_2002' => 'Pokok 2002',
            'TUNGGAKAN_2002' => 'Tunggakan 2002',
            'DENDA_2003' => 'Denda 2003',
            'POKOK_2003' => 'Pokok 2003',
            'TUNGGAKAN_2003' => 'Tunggakan 2003',
            'DENDA_2004' => 'Denda 2004',
            'POKOK_2004' => 'Pokok 2004',
            'TUNGGAKAN_2004' => 'Tunggakan 2004',
            'DENDA_2005' => 'Denda 2005',
            'POKOK_2005' => 'Pokok 2005',
            'TUNGGAKAN_2005' => 'Tunggakan 2005',
            'DENDA_2006' => 'Denda 2006',
            'POKOK_2006' => 'Pokok 2006',
            'TUNGGAKAN_2006' => 'Tunggakan 2006',
            'DENDA_2007' => 'Denda 2007',
            'POKOK_2007' => 'Pokok 2007',
            'TUNGGAKAN_2007' => 'Tunggakan 2007',
            'DENDA_2008' => 'Denda 2008',
            'POKOK_2008' => 'Pokok 2008',
            'TUNGGAKAN_2008' => 'Tunggakan 2008',
            'DENDA_2009' => 'Denda 2009',
            'POKOK_2009' => 'Pokok 2009',
            'TUNGGAKAN_2009' => 'Tunggakan 2009',
            'DENDA_2010' => 'Denda 2010',
            'POKOK_2010' => 'Pokok 2010',
            'TUNGGAKAN_2010' => 'Tunggakan 2010',
            'DENDA_2011' => 'Denda 2011',
            'POKOK_2011' => 'Pokok 2011',
            'TUNGGAKAN_2011' => 'Tunggakan 2011',
            'DENDA_2012' => 'Denda 2012',
            'POKOK_2012' => 'Pokok 2012',
            'TUNGGAKAN_2012' => 'Tunggakan 2012',
            'DENDA_2013' => 'Denda 2013',
            'POKOK_2013' => 'Pokok 2013',
            'TUNGGAKAN_2013' => 'Tunggakan 2013',
            'DENDA_2014' => 'Denda 2014',
            'POKOK_2014' => 'Pokok 2014',
            'TUNGGAKAN_2014' => 'Tunggakan 2014',
        ];
    }
}
