<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatOpBangunan */

$this->title = 'Create Dat Op Bangunan';
$this->params['breadcrumbs'][] = ['label' => 'Dat Op Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
