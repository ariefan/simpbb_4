<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefDusun;

/**
 * RefDusunSearch represents the model behind the search form about `app\models\RefDusun`.
 */
class RefDusunSearch extends RefDusun
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_DUSUN', 'NM_DUSUN', 'NAMA', 'JABATAN', 'NO_TELP','NM_KELURAHAN'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = RefDusun::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('kelurahan');

        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_DUSUN', $this->KD_DUSUN])
            ->andFilterWhere(['like', 'NM_DUSUN', $this->NM_DUSUN])
            ->andFilterWhere(['like', 'NM_KELURAHAN', $this->NM_KELURAHAN])
            ->andFilterWhere(['like', 'NAMA', $this->NAMA])
            ->andFilterWhere(['like', 'JABATAN', $this->JABATAN])
            ->andFilterWhere(['like', 'NO_TELP', $this->NO_TELP]);

        return $dataProvider;
    }
}
