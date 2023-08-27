<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TempLaporanPenetapan;

/**
 * PelayananSearch represents the model behind the search form about `app\models\Pelayanan`.
 */
class TempLaporanPenetapanSearch extends TempLaporanPenetapan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NO_PELAYANAN',
                'KD',
                'NO_FORMULIR',
                'TANGGAL_CETAK',
                'TANGGAL_INPUT',
                'NAMA_SEBELUM',
                'NOP_SEBELUM',
                'LT_SEBELUM',
                'LB_SEBELUM',
                'KETETAPAN_LAMA',
                'NAMA_BARU',
                'NOP_BARU',
                'LT_BARU',
                'LB_BARU',
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
        $query = TempLaporanPenetapan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'NO_PELAYANAN', $this->NO_PELAYANAN])
            ->andFilterWhere(['like', 'KD', $this->KD])
            ->andFilterWhere(['like', 'NO_FORMULIR', $this->NO_FORMULIR])
            ->andFilterWhere(['like', 'TANGGAL_CETAK', $this->TANGGAL_CETAK])
            ->andFilterWhere(['like', 'TANGGAL_INPUT', $this->TANGGAL_INPUT])
            ->andFilterWhere(['like', 'NAMA_SEBELUM', $this->NAMA_SEBELUM])
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
