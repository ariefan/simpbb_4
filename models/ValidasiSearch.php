<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Validasi;

/**
 * ValidasiSearch represents the model behind the search form about `app\models\Validasi`.
 */
class ValidasiSearch extends Validasi
{
    public $pbb_min,$pbb_max;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'KETERANGAN', 'KELOMPOK', 'MODIFIED','NM_WP_SPPT','PBB','pbb_min','pbb_max','KATEGORI','VALIDASI_KE','JENIS','TINDAK_LANJUT'], 'safe'],
            [['IS_CETAK', 'IS_VALIDATED'], 'integer'],
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
        $query = Validasi::find();
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
            'IS_CETAK' => $this->IS_CETAK,
            'IS_VALIDATED' => $this->IS_VALIDATED,
            'MODIFIED' => $this->MODIFIED,
            'KATEGORI' => $this->KATEGORI,
            'VALIDASI_KE' => $this->VALIDASI_KE,
            'JENIS' => $this->JENIS,
        ]);

        $query->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'NM_WP_SPPT', $this->NM_WP_SPPT])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN])
            ->andFilterWhere(['like', 'TINDAK_LANJUT', $this->TINDAK_LANJUT]);
		
		//var_dump($this);

        if(!empty($this->pbb_max)){
            $query->andFilterWhere(['between', 'PBB', $this->pbb_min, $this->pbb_max]);
        }
        return $dataProvider;
    }
}
