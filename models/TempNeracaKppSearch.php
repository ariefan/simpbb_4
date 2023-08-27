<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TempNeracaKpp;

/**
 * PelayananSearch represents the model behind the search form about `app\models\Pelayanan`.
 */
class TempNeracaKppSearch extends TempNeracaKpp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KETETAPAN', 'POKOK_BAYAR', 'DENDA_BAYAR', 'SISA_PIUTANG', 'PENYISIHAN', 'NETTO'], 'number'],
            [['TGL_BAYAR'], 'safe'],
            [['NOP'], 'string', 'max' => 18],
            [['NAMA'], 'string', 'max' => 30],
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
        $query = TempNeracaKpp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'NOP', $this->NOP])
            ->andFilterWhere(['like', 'NAMA', $this->NAMA])
            ->andFilterWhere(['like', 'KETETAPAN', $this->KETETAPAN])
            ->andFilterWhere(['like', 'POKOK_BAYAR', $this->POKOK_BAYAR])
            ->andFilterWhere(['like', 'DENDA_BAYAR', $this->DENDA_BAYAR])
            ->andFilterWhere(['like', 'TGL_BAYAR', $this->TGL_BAYAR])
            ->andFilterWhere(['like', 'SISA_PIUTANG', $this->SISA_PIUTANG])
            ->andFilterWhere(['like', 'PENYISIHAN', $this->PENYISIHAN])
            ->andFilterWhere(['like', 'NETTO', $this->NETTO]);

        return $dataProvider;
    }
}
