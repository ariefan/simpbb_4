<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DatSubjekPajak;

/**
 * DatSubjekPajakSearch represents the model behind the search form of `app\models\DatSubjekPajak`.
 */
class DatSubjekPajakSearch extends DatSubjekPajak
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SUBJEK_PAJAK_ID', 'NM_WP', 'JALAN_WP', 'BLOK_KAV_NO_WP', 'RW_WP', 'RT_WP', 'KELURAHAN_WP', 'KOTA_WP', 'KD_POS_WP', 'TELP_WP', 'NPWP', 'STATUS_PEKERJAAN_WP'], 'safe'],
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
        $query = DatSubjekPajak::find();

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
        $query->andFilterWhere(['like', 'SUBJEK_PAJAK_ID', $this->SUBJEK_PAJAK_ID])
            ->andFilterWhere(['like', 'NM_WP', $this->NM_WP])
            ->andFilterWhere(['like', 'JALAN_WP', $this->JALAN_WP])
            ->andFilterWhere(['like', 'BLOK_KAV_NO_WP', $this->BLOK_KAV_NO_WP])
            ->andFilterWhere(['like', 'RW_WP', $this->RW_WP])
            ->andFilterWhere(['like', 'RT_WP', $this->RT_WP])
            ->andFilterWhere(['like', 'KELURAHAN_WP', $this->KELURAHAN_WP])
            ->andFilterWhere(['like', 'KOTA_WP', $this->KOTA_WP])
            ->andFilterWhere(['like', 'KD_POS_WP', $this->KD_POS_WP])
            ->andFilterWhere(['like', 'TELP_WP', $this->TELP_WP])
            ->andFilterWhere(['like', 'NPWP', $this->NPWP])
            ->andFilterWhere(['like', 'STATUS_PEKERJAAN_WP', $this->STATUS_PEKERJAAN_WP]);

        return $dataProvider;
    }
}
