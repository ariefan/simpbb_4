<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefDati2 */

$this->title = 'Create Ref Dati2';
$this->params['breadcrumbs'][] = ['label' => 'Ref Dati2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-dati2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
