<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SpptEVerifikator */

$this->title = 'Create Sppt E Verifikator';
$this->params['breadcrumbs'][] = ['label' => 'Sppt E Verifikator', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sppt-everifikator-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
