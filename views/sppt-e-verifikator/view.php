<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\SpptEVerifikator */

$this->title = 'Detail Verifikator';
$this->params['breadcrumbs'][] = ['label' => 'Sppt E Verifikator', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sppt-everifikator-view" style="padding: 15px">

    <div class="row">
        <div class="col-sm-4" style="margin-top: 15px">
        <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'verifikator_1' => $model->verifikator_1, 'verifikator_2' => $model->verifikator_2, 'verifikator_3' => $model->verifikator_3],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>          
            <?= Html::a('Update', ['update', 'verifikator_1' => $model->verifikator_1, 'verifikator_2' => $model->verifikator_2, 'verifikator_3' => $model->verifikator_3], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'verifikator_1' => $model->verifikator_1, 'verifikator_2' => $model->verifikator_2, 'verifikator_3' => $model->verifikator_3], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <h4>Verifikator 1</h4>
            </div>
            <?php 
            $gridColumnUser = [
                ['attribute' => 'id', 'visible' => false],
                'username',
                'jabatan',
                'role',
                'nama_lengkap',
                'nip',
                'nomor_hp',
            ];
            echo DetailView::widget([
                'model' => $model->verifikator1,
                'attributes' => $gridColumnUser    ]);
            ?>
        </div>
        <div class="col-md-4">
            <div class="row">
                <h4>Verifikator 2</h4>
            </div>
            <?php 
            $gridColumnUser = [
                ['attribute' => 'id', 'visible' => false],
                'username',
                'jabatan',
                'role',
                'nama_lengkap',
                'nip',
                'nomor_hp',
            ];
            echo DetailView::widget([
                'model' => $model->verifikator2,
                'attributes' => $gridColumnUser    ]);
            ?>
        </div>
        <div class="col-md-4">
            <div class="row">
                <h4>Verifikator 3</h4>
            </div>
            <?php 
            $gridColumnUser = [
                ['attribute' => 'id', 'visible' => false],
                'username',
                'jabatan',
                'role',
                'nama_lengkap',
                'nip',
                'nomor_hp',
            ];
            echo DetailView::widget([
                'model' => $model->verifikator3,
                'attributes' => $gridColumnUser    ]);
            ?>
        </div>
    </div>

    
</div>
