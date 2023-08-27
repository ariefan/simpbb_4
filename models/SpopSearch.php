<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Spop;

/**
 * SpopSearch represents the model behind the search form of `app\models\Spop`.
 */
class SpopSearch extends Spop
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'SUBJEK_PAJAK_ID', 'NO_FORMULIR_SPOP', 'JNS_TRANSAKSI_OP', 'KD_PROPINSI_BERSAMA', 'KD_DATI2_BERSAMA', 'KD_KECAMATAN_BERSAMA', 'KD_KELURAHAN_BERSAMA', 'KD_BLOK_BERSAMA', 'NO_URUT_BERSAMA', 'KD_JNS_OP_BERSAMA', 'KD_PROPINSI_ASAL', 'KD_DATI2_ASAL', 'KD_KECAMATAN_ASAL', 'KD_KELURAHAN_ASAL', 'KD_BLOK_ASAL', 'NO_URUT_ASAL', 'KD_JNS_OP_ASAL', 'NO_SPPT_LAMA', 'JALAN_OP', 'BLOK_KAV_NO_OP', 'KELURAHAN_OP', 'RW_OP', 'RT_OP', 'KD_STATUS_WP', 'KD_ZNT', 'JNS_BUMI', 'TGL_PENDATAAN_OP', 'NM_PENDATAAN_OP', 'NIP_PENDATA', 'TGL_PEMERIKSAAN_OP', 'NM_PEMERIKSAAN_OP', 'NIP_PEMERIKSA_OP', 'NO_PERSIL'], 'safe'],
            [['LUAS_BUMI', 'NILAI_SISTEM_BUMI'], 'integer'],
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
        $query = Spop::find();

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
            'LUAS_BUMI' => $this->LUAS_BUMI,
            'NILAI_SISTEM_BUMI' => $this->NILAI_SISTEM_BUMI,
            'TGL_PENDATAAN_OP' => $this->TGL_PENDATAAN_OP,
            'TGL_PEMERIKSAAN_OP' => $this->TGL_PEMERIKSAAN_OP,
        ]);

        $query->andFilterWhere(['like', 'CONCAT(KD_PROPINSI,KD_DATI2,KD_KECAMATAN,KD_KELURAHAN,KD_BLOK,NO_URUT,KD_JNS_OP)', $this->NOP])
            ->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'SUBJEK_PAJAK_ID', $this->SUBJEK_PAJAK_ID])
            ->andFilterWhere(['like', 'NO_FORMULIR_SPOP', $this->NO_FORMULIR_SPOP])
            ->andFilterWhere(['like', 'JNS_TRANSAKSI_OP', $this->JNS_TRANSAKSI_OP])
            ->andFilterWhere(['like', 'KD_PROPINSI_BERSAMA', $this->KD_PROPINSI_BERSAMA])
            ->andFilterWhere(['like', 'KD_DATI2_BERSAMA', $this->KD_DATI2_BERSAMA])
            ->andFilterWhere(['like', 'KD_KECAMATAN_BERSAMA', $this->KD_KECAMATAN_BERSAMA])
            ->andFilterWhere(['like', 'KD_KELURAHAN_BERSAMA', $this->KD_KELURAHAN_BERSAMA])
            ->andFilterWhere(['like', 'KD_BLOK_BERSAMA', $this->KD_BLOK_BERSAMA])
            ->andFilterWhere(['like', 'NO_URUT_BERSAMA', $this->NO_URUT_BERSAMA])
            ->andFilterWhere(['like', 'KD_JNS_OP_BERSAMA', $this->KD_JNS_OP_BERSAMA])
            ->andFilterWhere(['like', 'KD_PROPINSI_ASAL', $this->KD_PROPINSI_ASAL])
            ->andFilterWhere(['like', 'KD_DATI2_ASAL', $this->KD_DATI2_ASAL])
            ->andFilterWhere(['like', 'KD_KECAMATAN_ASAL', $this->KD_KECAMATAN_ASAL])
            ->andFilterWhere(['like', 'KD_KELURAHAN_ASAL', $this->KD_KELURAHAN_ASAL])
            ->andFilterWhere(['like', 'KD_BLOK_ASAL', $this->KD_BLOK_ASAL])
            ->andFilterWhere(['like', 'NO_URUT_ASAL', $this->NO_URUT_ASAL])
            ->andFilterWhere(['like', 'KD_JNS_OP_ASAL', $this->KD_JNS_OP_ASAL])
            ->andFilterWhere(['like', 'NO_SPPT_LAMA', $this->NO_SPPT_LAMA])
            ->andFilterWhere(['like', 'JALAN_OP', $this->JALAN_OP])
            ->andFilterWhere(['like', 'BLOK_KAV_NO_OP', $this->BLOK_KAV_NO_OP])
            ->andFilterWhere(['like', 'KELURAHAN_OP', $this->KELURAHAN_OP])
            ->andFilterWhere(['like', 'RW_OP', $this->RW_OP])
            ->andFilterWhere(['like', 'RT_OP', $this->RT_OP])
            ->andFilterWhere(['like', 'KD_STATUS_WP', $this->KD_STATUS_WP])
            ->andFilterWhere(['like', 'KD_ZNT', $this->KD_ZNT])
            ->andFilterWhere(['like', 'JNS_BUMI', $this->JNS_BUMI])
            ->andFilterWhere(['like', 'NM_PENDATAAN_OP', $this->NM_PENDATAAN_OP])
            ->andFilterWhere(['like', 'NIP_PENDATA', $this->NIP_PENDATA])
            ->andFilterWhere(['like', 'NM_PEMERIKSAAN_OP', $this->NM_PEMERIKSAAN_OP])
            ->andFilterWhere(['like', 'NIP_PEMERIKSA_OP', $this->NIP_PEMERIKSA_OP])
            ->andFilterWhere(['like', 'NO_PERSIL', $this->NO_PERSIL]);

        return $dataProvider;
    }
}
