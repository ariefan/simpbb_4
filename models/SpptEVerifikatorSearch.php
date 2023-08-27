<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpptEVerifikator;

/**
 * app\models\SpptEVerifikatorSearch represents the model behind the search form about `app\models\SpptEVerifikator`.
 */
 class SpptEVerifikatorSearch extends SpptEVerifikator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['verifikator_1', 'verifikator_2', 'verifikator_3'], 'integer'],
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
        $query = SpptEVerifikator::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'verifikator_1' => $this->verifikator_1,
            'verifikator_2' => $this->verifikator_2,
            'verifikator_3' => $this->verifikator_3,
        ]);

        return $dataProvider;
    }
}
