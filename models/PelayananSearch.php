<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelayanan;

/**
 * PelayananSearch represents the model behind the search form about `app\models\Pelayanan`.
 */
class PelayananSearch extends Pelayanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'STATUS_PELAYANAN'], 'integer'],
            [['NAMA_PEMOHON', 'ALAMAT_PEMOHON', 'NO_PELAYANAN', 'TANGGAL_PELAYANAN', 'KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'KD_JNS_PELAYANAN', 'TANGGAL_PERKIRAAN_SELESAI', 'NIP_PETUGAS_PENERIMA', 'NAMA_PETUGAS_PENERIMA', 'NIP_AR', 'NAMA_AR', 'CATATAN', 'KETERANGAN', 'TGL_MASUK_PENILAI', 'NIP_MASUK_PENILAI', 'TGL_SELESAI', 'NIP_SELESAI', 'TGL_TERKONFIRMASI_WP', 'NIP_TERKONFIRMASI_WP', 'TTD_JABATAN_KIRI', 'TTD_NAMA_KIRI', 'TTD_NIP_KIRI', 'TTD_JABATAN_KANAN', 'TTD_NAMA_KANAN', 'TTD_NIP_KANAN', 'TGL_PENETAPAN', 'NIP_PENETAPAN', 'TGL_BERKAS_DITUNDA', 'NIP_BERKAS_DITUNDA', 'LETAK_OP', 'KECAMATAN', 'KELURAHAN', 'KETERANGAN_BERKAS'], 'safe'],
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
	    $query = Pelayanan::find();
	    if(empty($params['sort']))
        $query->orderBy('TANGGAL_PELAYANAN DESC');

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
            'ID' => $this->ID,
            'TANGGAL_PELAYANAN' => $this->TANGGAL_PELAYANAN,
            'TANGGAL_PERKIRAAN_SELESAI' => $this->TANGGAL_PERKIRAAN_SELESAI,
            'STATUS_PELAYANAN' => $this->STATUS_PELAYANAN,
            'TGL_MASUK_PENILAI' => $this->TGL_MASUK_PENILAI,
            'TGL_SELESAI' => $this->TGL_SELESAI,
            'TGL_TERKONFIRMASI_WP' => $this->TGL_TERKONFIRMASI_WP,
            'TGL_PENETAPAN' => $this->TGL_PENETAPAN,
            'TGL_BERKAS_DITUNDA' => $this->TGL_BERKAS_DITUNDA,
        ]);

        $query->andFilterWhere(['like', 'NAMA_PEMOHON', $this->NAMA_PEMOHON])
            ->andFilterWhere(['like', 'ALAMAT_PEMOHON', $this->ALAMAT_PEMOHON])
            ->andFilterWhere(['like', 'NO_PELAYANAN', $this->NO_PELAYANAN])
            ->andFilterWhere(['like', 'KD_PROPINSI', $this->KD_PROPINSI])
            ->andFilterWhere(['like', 'KD_DATI2', $this->KD_DATI2])
            ->andFilterWhere(['like', 'KD_KECAMATAN', $this->KD_KECAMATAN])
            ->andFilterWhere(['like', 'KD_KELURAHAN', $this->KD_KELURAHAN])
            ->andFilterWhere(['like', 'KD_BLOK', $this->KD_BLOK])
            ->andFilterWhere(['like', 'NO_URUT', $this->NO_URUT])
            ->andFilterWhere(['like', 'KD_JNS_OP', $this->KD_JNS_OP])
            ->andFilterWhere(['like', 'KD_JNS_PELAYANAN', $this->KD_JNS_PELAYANAN])
            ->andFilterWhere(['like', 'NIP_PETUGAS_PENERIMA', $this->NIP_PETUGAS_PENERIMA])
            ->andFilterWhere(['like', 'NAMA_PETUGAS_PENERIMA', $this->NAMA_PETUGAS_PENERIMA])
            ->andFilterWhere(['like', 'NIP_AR', $this->NIP_AR])
            ->andFilterWhere(['like', 'NAMA_AR', $this->NAMA_AR])
            ->andFilterWhere(['like', 'CATATAN', $this->CATATAN])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN])
            ->andFilterWhere(['like', 'NIP_MASUK_PENILAI', $this->NIP_MASUK_PENILAI])
            ->andFilterWhere(['like', 'NIP_SELESAI', $this->NIP_SELESAI])
            ->andFilterWhere(['like', 'NIP_TERKONFIRMASI_WP', $this->NIP_TERKONFIRMASI_WP])
            ->andFilterWhere(['like', 'TTD_JABATAN_KIRI', $this->TTD_JABATAN_KIRI])
            ->andFilterWhere(['like', 'TTD_NAMA_KIRI', $this->TTD_NAMA_KIRI])
            ->andFilterWhere(['like', 'TTD_NIP_KIRI', $this->TTD_NIP_KIRI])
            ->andFilterWhere(['like', 'TTD_JABATAN_KANAN', $this->TTD_JABATAN_KANAN])
            ->andFilterWhere(['like', 'TTD_NAMA_KANAN', $this->TTD_NAMA_KANAN])
            ->andFilterWhere(['like', 'TTD_NIP_KANAN', $this->TTD_NIP_KANAN])
            ->andFilterWhere(['like', 'NIP_PENETAPAN', $this->NIP_PENETAPAN])
            ->andFilterWhere(['like', 'NIP_BERKAS_DITUNDA', $this->NIP_BERKAS_DITUNDA])
            ->andFilterWhere(['like', 'LETAK_OP', $this->LETAK_OP])
            ->andFilterWhere(['like', 'KECAMATAN', $this->KECAMATAN])
            ->andFilterWhere(['like', 'KELURAHAN', $this->KELURAHAN])
			->andFilterWhere(['like', 'KETERANGAN_BERKAS', $this->KETERANGAN_BERKAS]);

        return $dataProvider;
    }
}
