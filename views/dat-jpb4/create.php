<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb4 */

$this->title = 'Create Dat Jpb4';
$this->params['breadcrumbs'][] = ['label' => 'Dat Jpb4s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-jpb4-create">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
