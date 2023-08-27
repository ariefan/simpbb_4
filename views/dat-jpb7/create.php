<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb7 */

$this->title = 'Create Dat Jpb7';
$this->params['breadcrumbs'][] = ['label' => 'Dat Jpb7s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-jpb7-create">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
