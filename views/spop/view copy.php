<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spop */

$this->title = $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Spops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="spop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP], [
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
            'SUBJEK_PAJAK_ID',
            'NO_FORMULIR_SPOP',
            'JNS_TRANSAKSI_OP',
            //bersama
            'KD_PROPINSI_BERSAMA',
            'KD_DATI2_BERSAMA',
            'KD_KECAMATAN_BERSAMA',
            'KD_KELURAHAN_BERSAMA',
            'KD_BLOK_BERSAMA',
            'NO_URUT_BERSAMA',
            'KD_JNS_OP_BERSAMA',
            //asal
            'KD_PROPINSI_ASAL',
            'KD_DATI2_ASAL',
            'KD_KECAMATAN_ASAL',
            'KD_KELURAHAN_ASAL',
            'KD_BLOK_ASAL',
            'NO_URUT_ASAL',
            'KD_JNS_OP_ASAL',
            //data op
            'NO_SPPT_LAMA',
            'JALAN_OP',
            'BLOK_KAV_NO_OP',
            'KELURAHAN_OP',
            'RW_OP',
            'RT_OP',
            'KD_STATUS_WP',
            'LUAS_BUMI',
            'KD_ZNT',
            'JNS_BUMI',
            'NILAI_SISTEM_BUMI',
            //pendataan
            'TGL_PENDATAAN_OP',
            'NM_PENDATAAN_OP',
            'NIP_PENDATA',
            'TGL_PEMERIKSAAN_OP',
            'NM_PEMERIKSAAN_OP',
            'NIP_PEMERIKSA_OP',
            'NO_PERSIL',
        ],
    ]) ?>

</div>