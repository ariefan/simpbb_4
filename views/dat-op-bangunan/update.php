<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatOpBangunan */

$this->title = 'Update Dat Op Bangunan: ' . $model->KD_PROPINSI.'.'.$model->KD_DATI2.'.'.$model->KD_KECAMATAN.'.'.$model->KD_KELURAHAN.'.'.$model->KD_BLOK.'.'.$model->NO_URUT.'.'.$model->KD_JNS_OP;
$this->params['breadcrumbs'][] = ['label' => 'Dat Op Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KD_PROPINSI, 'url' => ['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NO_BNG' => $model->NO_BNG]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
        'model_jpb2' => $model_jpb2,
        'model_jpb3' => $model_jpb3,
        'model_jpb4' => $model_jpb4,
        'model_jpb5' => $model_jpb5,
        'model_jpb6' => $model_jpb6,
        'model_jpb7' => $model_jpb7,
        'model_jpb8' => $model_jpb8,
        'model_jpb9' => $model_jpb9,
        'model_jpb12' => $model_jpb12,
        'model_jpb13' => $model_jpb13,
        'model_jpb14' => $model_jpb14,
        'model_jpb15' => $model_jpb15,
        'model_jpb16' => $model_jpb16,
        'fasilitas' => $fasilitas,
        'kelas' => $kelas,
    ]) ?>
