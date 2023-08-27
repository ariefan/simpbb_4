<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PencatatanEmail;

/**
 * PencatatanEmailSearch represents the model behind the search form of `app\models\PencatatanEmail`.
 */
class PencatatanEmailSearch extends PencatatanEmail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NM_WP_SPPT', 'EMAIL', 'NAMA_PENERIMA', 'KEPEMILIKAN', 'KEPEMILIKAN_LAINNYA', 'WAKTU_PENDATA','NIK','NO_TELP'], 'safe'],
            [['PENDATA'], 'integer'],
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
        $query = PencatatanEmail::find();

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
            'PENDATA' => $this->PENDATA,
            'WAKTU_PENDATA' => $this->WAKTU_PENDATA,
        ]);

        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'NIK', $this->NIK])
            ->andFilterWhere(['like', 'NO_TELP', $this->NO_TELP])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'NM_WP_SPPT', $this->NM_WP_SPPT])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'NAMA_PENERIMA', $this->NAMA_PENERIMA])
            ->andFilterWhere(['like', 'KEPEMILIKAN', $this->KEPEMILIKAN])
            ->andFilterWhere(['like', 'KEPEMILIKAN_LAINNYA', $this->KEPEMILIKAN_LAINNYA]);

        return $dataProvider;
    }
}
