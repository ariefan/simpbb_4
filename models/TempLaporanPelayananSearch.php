<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TempLaporanPelayanan;

/**
 * PelayananSearch represents the model behind the search form about `app\models\Pelayanan`.
 */
class TempLaporanPelayananSearch extends TempLaporanPelayanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[
            'NO_PELAYANAN',
            'TGL',
            'KETERANGAN',
            'CATATAN',
            'NAMA_SEBELUM',
            'NOP_SEBELUM',
            'LT_SEBELUM',
            'LB_SEBELUM',
            'KETETAPAN_LAMA',
            'NAMA_BARU',
            'NOP_BARU',
            'LT_BARU',
            'LB_BARU',
            'KD',
            'KETETAPAN_BARU',
            'SELISIH_KETETAPAN'], 'safe'],
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
        $query = TempLaporanPelayanan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'NO_PELAYANAN', $this->NO_PELAYANAN])
            ->andFilterWhere(['like', 'NAMA_SEBELUM', $this->NAMA_SEBELUM])
            ->andFilterWhere(['like', 'TGL', $this->TGL])
            ->andFilterWhere(['like', 'KD', $this->KD])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN])
            ->andFilterWhere(['like', 'CATATAN', $this->CATATAN])
            ->andFilterWhere(['like', 'NOP_SEBELUM', $this->NOP_SEBELUM])
            ->andFilterWhere(['like', 'LT_SEBELUM', $this->LT_SEBELUM])
            ->andFilterWhere(['like', 'LB_SEBELUM', $this->LB_SEBELUM])
            ->andFilterWhere(['like', 'KETETAPAN_LAMA', $this->KETETAPAN_LAMA])
            ->andFilterWhere(['like', 'NAMA_BARU', $this->NAMA_BARU])
            ->andFilterWhere(['like', 'NOP_BARU', $this->NOP_BARU])
            ->andFilterWhere(['like', 'LT_BARU', $this->LT_BARU])
            ->andFilterWhere(['like', 'LB_BARU', $this->LB_BARU])
            ->andFilterWhere(['like', 'KETETAPAN_BARU', $this->KETETAPAN_BARU])
            ->andFilterWhere(['like', 'SELISIH_KETETAPAN', $this->SELISIH_KETETAPAN]);

        return $dataProvider;
    }
}
