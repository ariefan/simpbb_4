<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'KD_PROPINSI',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'KD_DATI2',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'KD_KECAMATAN',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'KD_KELURAHAN',
    ],
    [
        'label' => 'Nama Kelurahan',
        'attribute'=>'NM_KELURAHAN',
        'value' => 'kelurahan.NM_KELURAHAN'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'KD_DUSUN',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'NM_DUSUN',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'NAMA',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'JABATAN',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'NO_TELP',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'KD_PROPINSI'=>$model->KD_PROPINSI, 'KD_DATI2'=>$model->KD_DATI2, 'KD_KECAMATAN'=>$model->KD_KECAMATAN, 'KD_KELURAHAN'=>$model->KD_KELURAHAN, 'KD_DUSUN'=>$model->KD_DUSUN]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   