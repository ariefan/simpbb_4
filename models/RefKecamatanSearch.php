<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefKecamatan;

/**
 * RefKecamatanSearch represents the model behind the search form of `app\models\RefKecamatan`.
 */
class RefKecamatanSearch extends RefKecamatan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'NM_KECAMATAN'], 'safe'],
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
        $query = RefKecamatan::find();

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
        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'NM_KECAMATAN', $this->NM_KECAMATAN]);

        return $dataProvider;
    }
}
