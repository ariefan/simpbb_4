<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb6 */

$this->title = 'Create Dat Jpb6';
$this->params['breadcrumbs'][] = ['label' => 'Dat Jpb6s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-jpb6-create">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
