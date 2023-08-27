<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spop */

$this->title = 'Create Spop';
$this->params['breadcrumbs'][] = ['label' => 'Spops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
        'model_wp' => $model_wp,
        'propinsis' => $propinsis,
        'action' => 'add',
        'kelas' => $kelas,
    ]) ?>