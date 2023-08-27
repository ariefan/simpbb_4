<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpptEVerifikator */

$this->title = 'Update Verifikator';
$this->params['breadcrumbs'][] = ['label' => 'Sppt E Verifikator', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->verifikator_1, 'url' => ['view', 'verifikator_1' => $model->verifikator_1, 'verifikator_2' => $model->verifikator_2, 'verifikator_3' => $model->verifikator_3]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sppt-everifikator-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
