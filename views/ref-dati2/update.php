<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefDati2 */

$this->title = 'Update Ref Dati2: ' . $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Ref Dati2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KD_PROPINSI, 'url' => ['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-dati2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
