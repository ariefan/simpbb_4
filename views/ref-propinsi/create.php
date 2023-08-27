<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefPropinsi */

$this->title = 'Create Ref Propinsi';
$this->params['breadcrumbs'][] = ['label' => 'Ref Propinsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-propinsi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
