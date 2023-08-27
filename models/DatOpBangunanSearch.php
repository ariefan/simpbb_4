<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DatOpBangunan;

/**
 * DatOpBangunanSearch represents the model behind the search form of `app\models\DatOpBangunan`.
 */
class DatOpBangunanSearch extends DatOpBangunan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'KD_JPB', 'NO_FORMULIR_LSPOP', 'THN_DIBANGUN_BNG', 'THN_RENOVASI_BNG', 'KONDISI_BNG', 'JNS_KONSTRUKSI_BNG', 'JNS_ATAP_BNG', 'KD_DINDING', 'KD_LANTAI', 'KD_LANGIT_LANGIT', 'JNS_TRANSAKSI_BNG', 'TGL_PENDATAAN_BNG', 'NIP_PENDATA_BNG', 'TGL_PEMERIKSAAN_BNG', 'NIP_PEMERIKSA_BNG', 'TGL_PEREKAMAN_BNG', 'NIP_PEREKAM_BNG', 'TGL_KUNJUNGAN_KEMBALI'], 'safe'],
            [['NO_BNG', 'LUAS_BNG', 'JML_LANTAI_BNG', 'NILAI_SISTEM_BNG', 'NILAI_INDIVIDU', 'AKTIF'], 'integer'],
            [['NOP'], 'string'],
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
        $query = DatOpBangunan::find();

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
            'NILAI_SISTEM_BNG' => $this->NILAI_SISTEM_BNG,
            'TGL_PENDATAAN_BNG' => $this->TGL_PENDATAAN_BNG,
            'TGL_PEMERIKSAAN_BNG' => $this->TGL_PEMERIKSAAN_BNG,
            'TGL_PEREKAMAN_BNG' => $this->TGL_PEREKAMAN_BNG,
            'TGL_KUNJUNGAN_KEMBALI' => $this->TGL_KUNJUNGAN_KEMBALI,
            'NILAI_INDIVIDU' => $this->NILAI_INDIVIDU,
            'AKTIF' => $this->AKTIF,
        ]);

        $query->andFilterWhere(['like', 'CONCAT(KD_PROPINSI,KD_DATI2,KD_KECAMATAN,KD_KELURAHAN,KD_BLOK,NO_URUT,KD_JNS_OP)', $this->NOP])
            ->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'KD_JPB', $this->KD_JPB])
            ->andFilterWhere(['like', 'NO_FORMULIR_LSPOP', $this->NO_FORMULIR_LSPOP])
            ->andFilterWhere(['like', 'THN_DIBANGUN_BNG', $this->THN_DIBANGUN_BNG])
            ->andFilterWhere(['like', 'THN_RENOVASI_BNG', $this->THN_RENOVASI_BNG])
            ->andFilterWhere(['like', 'KONDISI_BNG', $this->KONDISI_BNG])
            ->andFilterWhere(['like', 'JNS_KONSTRUKSI_BNG', $this->JNS_KONSTRUKSI_BNG])
            ->andFilterWhere(['like', 'JNS_ATAP_BNG', $this->JNS_ATAP_BNG])
            ->andFilterWhere(['like', 'KD_DINDING', $this->KD_DINDING])
            ->andFilterWhere(['like', 'KD_LANTAI', $this->KD_LANTAI])
            ->andFilterWhere(['like', 'KD_LANGIT_LANGIT', $this->KD_LANGIT_LANGIT])
            ->andFilterWhere(['like', 'JNS_TRANSAKSI_BNG', $this->JNS_TRANSAKSI_BNG])
            ->andFilterWhere(['like', 'NIP_PENDATA_BNG', $this->NIP_PENDATA_BNG])
            ->andFilterWhere(['like', 'NIP_PEMERIKSA_BNG', $this->NIP_PEMERIKSA_BNG])
            ->andFilterWhere(['like', 'NIP_PEREKAM_BNG', $this->NIP_PEREKAM_BNG]);

        return $dataProvider;
    }
}
