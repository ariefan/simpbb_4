<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DatJpb5;

/**
 * DatJpb5Search represents the model behind the search form of `app\models\DatJpb5`.
 */
class DatJpb5Search extends DatJpb5
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'KLS_JPB5'], 'safe'],
            [['NO_BNG'], 'integer'],
            [['LUAS_KMR_JPB5_DGN_AC_SENT', 'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT'], 'number'],
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
        $query = DatJpb5::find();

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
            'LUAS_KMR_JPB5_DGN_AC_SENT' => $this->LUAS_KMR_JPB5_DGN_AC_SENT,
            'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT' => $this->LUAS_RNG_LAIN_JPB5_DGN_AC_SENT,
        ]);

        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'KLS_JPB5', $this->KLS_JPB5]);

        return $dataProvider;
    }
}
