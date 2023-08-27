<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pelayanan */

$this->title = 'Update Pelayanan: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Pelayanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelayanan-update">

    <?= $this->render('_form', compact('model','dok_pelayanan')) ?>

</div>
