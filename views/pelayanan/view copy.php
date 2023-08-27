<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pelayanan */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Pelayanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelayanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'NAMA_PEMOHON',
            'ALAMAT_PEMOHON',
            'NO_PELAYANAN',
            'TANGGAL_PELAYANAN',
            'KD_PROPINSI',
            'KD_DATI2',
            'KD_KECAMATAN',
            'KD_KELURAHAN',
            'KD_BLOK',
            'NO_URUT',
            'KD_JNS_OP',
            'KD_JNS_PELAYANAN',
            'TANGGAL_PERKIRAAN_SELESAI',
            'STATUS_PELAYANAN',
            'NIP_PETUGAS_PENERIMA',
            'NAMA_PETUGAS_PENERIMA',
            'NIP_AR',
            'NAMA_AR',
            'CATATAN:ntext',
            'KETERANGAN:ntext',
            'TGL_MASUK_PENILAI',
            'NIP_MASUK_PENILAI',
            'TGL_SELESAI',
            'NIP_SELESAI',
            'TGL_TERKONFIRMASI_WP',
            'NIP_TERKONFIRMASI_WP',
            'TTD_JABATAN_KIRI',
            'TTD_NAMA_KIRI',
            'TTD_NIP_KIRI',
            'TTD_JABATAN_KANAN',
            'TTD_NAMA_KANAN',
            'TTD_NIP_KANAN',
            'TGL_PENETAPAN',
            'NIP_PENETAPAN',
            'TGL_BERKAS_DITUNDA',
            'NIP_BERKAS_DITUNDA',
            'LETAK_OP',
            'KECAMATAN',
            'KELURAHAN',
        ],
    ]) ?>

</div>