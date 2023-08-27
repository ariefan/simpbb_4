<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpptE */

$this->title = 'Tambah NOP';
$this->params['breadcrumbs'][] = ['label' => 'Sppt Es', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sppt-e-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
