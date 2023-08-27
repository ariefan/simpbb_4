<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DatSubjekPajak */

$this->title = $model->SUBJEK_PAJAK_ID;
$this->params['breadcrumbs'][] = ['label' => 'Dat Subjek Pajaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dat-subjek-pajak-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SUBJEK_PAJAK_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SUBJEK_PAJAK_ID], [
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
            'SUBJEK_PAJAK_ID',
            'NM_WP',
            'JALAN_WP',
            'BLOK_KAV_NO_WP',
            'RW_WP',
            'RT_WP',
            'KELURAHAN_WP',
            'KOTA_WP',
            'KD_POS_WP',
            'TELP_WP',
            'NPWP',
            'STATUS_PEKERJAAN_WP',
        ],
    ]) ?>

</div>
