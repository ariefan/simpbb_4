<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PencatatanEmail */

$this->title = 'Detail Catatan';
$this->params['breadcrumbs'][] = ['label' => 'Pencatatan Email', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pencatatan-email-view">
    <p>
        <?= Html::a('Update', ['update', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NM_WP_SPPT' => $model->NM_WP_SPPT], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Kirim Email', ['send', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NM_WP_SPPT' => $model->NM_WP_SPPT], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Delete', ['delete', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NM_WP_SPPT' => $model->NM_WP_SPPT], [
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
            'NM_WP_SPPT',
            'NIK',
            'NO_TELP',
            'EMAIL:email',
            'NAMA_PENERIMA',
            'KEPEMILIKAN',
            'KEPEMILIKAN_LAINNYA',
            'PENDATA',
            'WAKTU_PENDATA',
        ],
    ]) ?>

</div>
