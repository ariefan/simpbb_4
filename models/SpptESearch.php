<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpptE;

/**
 * SpptESearch represents the model behind the search form of `app\models\SpptE`.
 */
class SpptESearch extends SpptE
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'EMAIL', 'NM_WP_SPPT', 'TGL_PEMBAYARAN_TERAKHIR', 'TGL_DIBUAT', 'TGL_EMAIL', 'TGL_RECORD', 'TGL_VERIFIKASI_1', 'TGL_VERIFIKASI_2', 'TGL_VERIFIKASI_3', 'TGL_KIRIM_TTD', 'TGL_TERIMA_TTD', 'FILE_SPPT'], 'safe'],
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
    public function search($params, $verifikator = 0)
    {
        $query = SpptE::find()
            ->andWhere(['not', ['FILE_SPPT' => null]])
            ->andWhere(['not', ['TGL_DIBUAT' => null]]);

        if($verifikator>0){
            $query->andWhere(['TGL_VERIFIKASI_'.$verifikator => null]);
        }

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
            'THN_PAJAK_SPPT' => $this->THN_PAJAK_SPPT,
        ]);

        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'TGL_VERIFIKASI_1', $this->TGL_VERIFIKASI_1])
            ->andFilterWhere(['like', 'TGL_VERIFIKASI_2', $this->TGL_VERIFIKASI_2])
            ->andFilterWhere(['like', 'TGL_VERIFIKASI_3', $this->TGL_VERIFIKASI_3])
            ->andFilterWhere(['like', 'TGL_PEMBAYARAN_TERAKHIR', $this->TGL_PEMBAYARAN_TERAKHIR])
            ->andFilterWhere(['like', 'TGL_DIBUAT', $this->TGL_DIBUAT])
            ->andFilterWhere(['like', 'TGL_EMAIL', $this->TGL_EMAIL])
            ->andFilterWhere(['like', 'TGL_RECORD', $this->TGL_RECORD])
            ->andFilterWhere(['like', 'TGL_KIRIM_TTD', $this->TGL_KIRIM_TTD])
            ->andFilterWhere(['like', 'TGL_TERIMA_TTD', $this->TGL_TERIMA_TTD])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'NM_WP_SPPT', $this->NM_WP_SPPT])
            ->andFilterWhere(['like', 'FILE_SPPT', $this->FILE_SPPT]);

        return $dataProvider;
    }
}
