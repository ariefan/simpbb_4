<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pelayanan */

$this->title = 'Buat Pelayanan';
$this->params['breadcrumbs'][] = ['label' => 'Pelayanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelayanan-create">

    <?= $this->render('_form', compact('model','dok_pelayanan')) ?>

</div>
