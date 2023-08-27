<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DatJpb7;

/**
 * DatJpb7Search represents the model behind the search form of `app\models\DatJpb7`.
 */
class DatJpb7Search extends DatJpb7
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'JNS_JPB7', 'BINTANG_JPB7'], 'safe'],
            [['NO_BNG'], 'integer'],
            [['JML_KMR_JPB7', 'LUAS_KMR_JPB7_DGN_AC_SENT', 'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT'], 'number'],
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
        $query = DatJpb7::find();

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
            'NO_BNG' => $this->NO_BNG,
            'JML_KMR_JPB7' => $this->JML_KMR_JPB7,
            'LUAS_KMR_JPB7_DGN_AC_SENT' => $this->LUAS_KMR_JPB7_DGN_AC_SENT,
            'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT' => $this->LUAS_KMR_LAIN_JPB7_DGN_AC_SENT,
        ]);

        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'JNS_JPB7', $this->JNS_JPB7])
            ->andFilterWhere(['like', 'BINTANG_JPB7', $this->BINTANG_JPB7]);

        return $dataProvider;
    }
}
