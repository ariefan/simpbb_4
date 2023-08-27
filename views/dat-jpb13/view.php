<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb13 */

$this->title = $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Dat Jpb13s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dat-jpb13-view">

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
            'KLS_JPB13',
            'JML_JPB13',
            'LUAS_JPB13_DGN_AC_SENT',
            'LUAS_JPB13_LAIN_DGN_AC_SENT',
        ],
    ]) ?>

</div>
