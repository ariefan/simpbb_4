<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefPropinsi */

$this->title = 'Update Ref Propinsi: ' . $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Ref Propinsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KD_PROPINSI, 'url' => ['view', 'id' => $model->KD_PROPINSI]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-propinsi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
