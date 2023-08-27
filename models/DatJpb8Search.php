<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DatJpb8;

/**
 * DatJpb8Search represents the model behind the search form of `app\models\DatJpb8`.
 */
class DatJpb8Search extends DatJpb8
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'TYPE_KONSTRUKSI'], 'safe'],
            [['NO_BNG'], 'integer'],
            [['TING_KOLOM_JPB8', 'LBR_BENT_JPB8', 'LUAS_MEZZANINE_JPB8', 'KELILING_DINDING_JPB8', 'DAYA_DUKUNG_LANTAI_JPB8'], 'number'],
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
        $query = DatJpb8::find();

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
            'TING_KOLOM_JPB8' => $this->TING_KOLOM_JPB8,
            'LBR_BENT_JPB8' => $this->LBR_BENT_JPB8,
            'LUAS_MEZZANINE_JPB8' => $this->LUAS_MEZZANINE_JPB8,
            'KELILING_DINDING_JPB8' => $this->KELILING_DINDING_JPB8,
            'DAYA_DUKUNG_LANTAI_JPB8' => $this->DAYA_DUKUNG_LANTAI_JPB8,
        ]);

        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'TYPE_KONSTRUKSI', $this->TYPE_KONSTRUKSI]);

        return $dataProvider;
    }
}
