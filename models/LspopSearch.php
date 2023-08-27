<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lspop;

/**
 * LspopSearch represents the model behind the search form of `app\models\Lspop`.
 */
class LspopSearch extends Lspop
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_FORMULIR_LSPOP', 'JNS_TRANSAKSI_BNG', 'KD_JPB', 'THN_DIBANGUN_BNG', 'THN_RENOVASI_BNG', 'KONDISI_BNG', 'JNS_KONSTRUKSI_BNG', 'JNS_ATAP_BNG', 'KD_DINDING', 'KD_LANTAI', 'KD_LANGIT_LANGIT', 'KLS_JPB2', 'KLS_JPB4', 'KLS_JPB5', 'KLS_JPB6', 'JNS_JPB7', 'BINTANG_JPB7', 'TYPE_JPB12', 'KLS_JPB13', 'LETAK_TANGKI_JPB15', 'KLS_JPB16', 'TGL_KUNJUNGAN_KEMBALI', 'TGL_PENDATAAN_BNG', 'NM_PENDATAAN_OP', 'NIP_PENDATA_BNG', 'TGL_PEMERIKSAAN_BNG', 'NM_PEMERIKSAAN_OP', 'NIP_PEMERIKSA_BNG'], 'safe'],
            [['NO_BNG', 'LUAS_BNG', 'JML_LANTAI_BNG', 'TING_KOLOM_JPB3', 'LBR_BENT_JPB3', 'DAYA_DUKUNG_LANTAI_JPB3', 'KELILING_DINDING_JPB3', 'LUAS_MEZZANINE_JPB3', 'LUAS_KMR_JPB5_DGN_AC_SENT', 'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT', 'JML_KMR_JPB7', 'LUAS_KMR_JPB7_DGN_AC_SENT', 'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT', 'JML_JPB13', 'LUAS_JPB13_DGN_AC_SENT', 'LUAS_JPB13_LAIN_DGN_AC_SENT', 'KAPASITAS_TANGKI_JPB15', 'NILAI_SISTEM_BNG', 'NILAI_FORMULA', 'NILAI_INDIVIDU', 'AKTIF'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Lspop::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'NO_BNG' => $this->NO_BNG,
            'LUAS_BNG' => $this->LUAS_BNG,
            'JML_LANTAI_BNG' => $this->JML_LANTAI_BNG,
            'TING_KOLOM_JPB3' => $this->TING_KOLOM_JPB3,
            'LBR_BENT_JPB3' => $this->LBR_BENT_JPB3,
            'DAYA_DUKUNG_LANTAI_JPB3' => $this->DAYA_DUKUNG_LANTAI_JPB3,
            'KELILING_DINDING_JPB3' => $this->KELILING_DINDING_JPB3,
            'LUAS_MEZZANINE_JPB3' => $this->LUAS_MEZZANINE_JPB3,
            'LUAS_KMR_JPB5_DGN_AC_SENT' => $this->LUAS_KMR_JPB5_DGN_AC_SENT,
            'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT' => $this->LUAS_RNG_LAIN_JPB5_DGN_AC_SENT,
            'JML_KMR_JPB7' => $this->JML_KMR_JPB7,
            'LUAS_KMR_JPB7_DGN_AC_SENT' => $this->LUAS_KMR_JPB7_DGN_AC_SENT,
            'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT' => $this->LUAS_KMR_LAIN_JPB7_DGN_AC_SENT,
            'JML_JPB13' => $this->JML_JPB13,
            'LUAS_JPB13_DGN_AC_SENT' => $this->LUAS_JPB13_DGN_AC_SENT,
            'LUAS_JPB13_LAIN_DGN_AC_SENT' => $this->LUAS_JPB13_LAIN_DGN_AC_SENT,
            'KAPASITAS_TANGKI_JPB15' => $this->KAPASITAS_TANGKI_JPB15,
            'NILAI_SISTEM_BNG' => $this->NILAI_SISTEM_BNG,
            'NILAI_FORMULA' => $this->NILAI_FORMULA,
            'NILAI_INDIVIDU' => $this->NILAI_INDIVIDU,
            'TGL_KUNJUNGAN_KEMBALI' => $this->TGL_KUNJUNGAN_KEMBALI,
            'TGL_PENDATAAN_BNG' => $this->TGL_PENDATAAN_BNG,
            'TGL_PEMERIKSAAN_BNG' => $this->TGL_PEMERIKSAAN_BNG,
            'AKTIF' => $this->AKTIF,
        ]);

        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'NO_FORMULIR_LSPOP', $this->NO_FORMULIR_LSPOP])
            ->andFilterWhere(['like', 'JNS_TRANSAKSI_BNG', $this->JNS_TRANSAKSI_BNG])
            ->andFilterWhere(['like', 'KD_JPB', $this->KD_JPB])
            ->andFilterWhere(['like', 'THN_DIBANGUN_BNG', $this->THN_DIBANGUN_BNG])
            ->andFilterWhere(['like', 'THN_RENOVASI_BNG', $this->THN_RENOVASI_BNG])
            ->andFilterWhere(['like', 'KONDISI_BNG', $this->KONDISI_BNG])
            ->andFilterWhere(['like', 'JNS_KONSTRUKSI_BNG', $this->JNS_KONSTRUKSI_BNG])
            ->andFilterWhere(['like', 'JNS_ATAP_BNG', $this->JNS_ATAP_BNG])
            ->andFilterWhere(['like', 'KD_DINDING', $this->KD_DINDING])
            ->andFilterWhere(['like', 'KD_LANTAI', $this->KD_LANTAI])
            ->andFilterWhere(['like', 'KD_LANGIT_LANGIT', $this->KD_LANGIT_LANGIT])
            ->andFilterWhere(['like', 'KLS_JPB2', $this->KLS_JPB2])
            ->andFilterWhere(['like', 'KLS_JPB4', $this->KLS_JPB4])
            ->andFilterWhere(['like', 'KLS_JPB5', $this->KLS_JPB5])
            ->andFilterWhere(['like', 'KLS_JPB6', $this->KLS_JPB6])
            ->andFilterWhere(['like', 'JNS_JPB7', $this->JNS_JPB7])
            ->andFilterWhere(['like', 'BINTANG_JPB7', $this->BINTANG_JPB7])
            ->andFilterWhere(['like', 'TYPE_JPB12', $this->TYPE_JPB12])
            ->andFilterWhere(['like', 'KLS_JPB13', $this->KLS_JPB13])
            ->andFilterWhere(['like', 'LETAK_TANGKI_JPB15', $this->LETAK_TANGKI_JPB15])
            ->andFilterWhere(['like', 'KLS_JPB16', $this->KLS_JPB16])
            ->andFilterWhere(['like', 'NM_PENDATAAN_OP', $this->NM_PENDATAAN_OP])
            ->andFilterWhere(['like', 'NIP_PENDATA_BNG', $this->NIP_PENDATA_BNG])
            ->andFilterWhere(['like', 'NM_PEMERIKSAAN_OP', $this->NM_PEMERIKSAAN_OP])
            ->andFilterWhere(['like', 'NIP_PEMERIKSA_BNG', $this->NIP_PEMERIKSA_BNG]);

        return $dataProvider;
    }
}
