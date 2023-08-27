<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DatOpBangunan */

$this->title = $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Dat Op Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dat-op-bangunan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NO_BNG' => $model->NO_BNG], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NO_BNG' => $model->NO_BNG], [
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
            'KD_PROPINSI',
            'KD_DATI2',
            'KD_KECAMATAN',
            'KD_KELURAHAN',
            'KD_BLOK',
            'NO_URUT',
            'KD_JNS_OP',
            'NO_BNG',
            'KD_JPB',
            'NO_FORMULIR_LSPOP',
            'THN_DIBANGUN_BNG',
            'THN_RENOVASI_BNG',
            'LUAS_BNG',
            'JML_LANTAI_BNG',
            'KONDISI_BNG',
            'JNS_KONSTRUKSI_BNG',
            'JNS_ATAP_BNG',
            'KD_DINDING',
            'KD_LANTAI',
            'KD_LANGIT_LANGIT',
            'NILAI_SISTEM_BNG',
            'JNS_TRANSAKSI_BNG',
            'TGL_PENDATAAN_BNG',
            'NIP_PENDATA_BNG',
            'TGL_PEMERIKSAAN_BNG',
            'NIP_PEMERIKSA_BNG',
            'TGL_PEREKAMAN_BNG',
            'NIP_PEREKAM_BNG',
            'TGL_KUNJUNGAN_KEMBALI',
            'NILAI_INDIVIDU',
            'AKTIF',
        ],
    ]) ?>

</div>
