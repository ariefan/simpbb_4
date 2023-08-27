<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SpptE */

$this->title = $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Sppt Es', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sppt-e-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'THN_PAJAK_SPPT' => $model->THN_PAJAK_SPPT], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'THN_PAJAK_SPPT' => $model->THN_PAJAK_SPPT], [
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
            'THN_PAJAK_SPPT',
            'EMAIL:email',
            'NM_WP_SPPT',
            'TGL_PEMBAYARAN_TERAKHIR',
            'TGL_DIBUAT',
            'TGL_EMAIL:email',
            'TGL_RECORD',
            'TGL_VERIFIKASI_1',
            'TGL_VERIFIKASI_2',
            'TGL_VERIFIKASI_3',
            'TGL_KIRIM_TTD',
            'TGL_TERIMA_TTD',
            'FILE_SPPT:ntext',
        ],
    ]) ?>

</div>
