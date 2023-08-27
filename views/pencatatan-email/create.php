<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PencatatanEmail */

$this->title = 'Catat Email Baru';
$this->params['breadcrumbs'][] = ['label' => 'Pencatatan Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pencatatan-email-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
