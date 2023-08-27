<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb14 */

$this->title = 'Create Dat Jpb14';
$this->params['breadcrumbs'][] = ['label' => 'Dat Jpb14s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-jpb14-create">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
