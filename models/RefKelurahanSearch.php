<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefKelurahan;

/**
 * RefKelurahanSearch represents the model behind the search form of `app\models\RefKelurahan`.
 */
class RefKelurahanSearch extends RefKelurahan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_SEKTOR', 'NM_KELURAHAN', 'KD_POS_KELURAHAN'], 'safe'],
            [['NO_KELURAHAN'], 'integer'],
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
        $query = RefKelurahan::find();

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
            'NO_KELURAHAN' => $this->NO_KELURAHAN,
        ]);

        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_SEKTOR', $this->KD_SEKTOR])
            ->andFilterWhere(['like', 'NM_KELURAHAN', $this->NM_KELURAHAN])
            ->andFilterWhere(['like', 'KD_POS_KELURAHAN', $this->KD_POS_KELURAHAN]);

        return $dataProvider;
    }
}
