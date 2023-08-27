<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SpptEVerifikator */

$this->title = 'Save As New Sppt E Verifikator: '. ' ' . $model->verifikator_1;
$this->params['breadcrumbs'][] = ['label' => 'Sppt E Verifikator', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->verifikator_1, 'url' => ['view', 'verifikator_1' => $model->verifikator_1, 'verifikator_2' => $model->verifikator_2, 'verifikator_3' => $model->verifikator_3]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="sppt-everifikator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
