<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\ValidasiKategori;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],

    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ], 
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'VALIDASI_KE',
        'editableOptions' => [
            'inputType'=>'textArea',
            'size'=>'sm',
            'header' => 'Validasi Ke-',
            'asPopover' => true,
            'options' => ['class'=>'form-control', 'rows'=>5, 'placeholder'=>'Isi validasi ke-']
        ]
    ],  
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'KD_KECAMATAN',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'KD_KELURAHAN',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'KD_BLOK',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'NO_URUT',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'KD_JNS_OP'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'NM_WP_SPPT',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'PBB',
        'format'=>'decimal',
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'KETERANGAN',
        'editableOptions' => [
            'inputType'=>'textArea',
            'size'=>'sm',
            'header' => 'Keterangan Validasi',
            'asPopover' => true,
            'options' => ['class'=>'form-control', 'rows'=>5, 'placeholder'=>'Isi dengan keterangan validasi...']
        ]
    ],
    
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'TINDAK_LANJUT',
        'editableOptions' => [
            'inputType'=>'textArea',
            'size'=>'sm',
            'header' => 'Tindak Lanjut',
            'asPopover' => true,
            'options' => ['class'=>'form-control', 'rows'=>5, 'placeholder'=>'Isi dengan tindak lanjut...']
        ]
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'IS_CETAK',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>[0 => 'Belum', 1 => 'Sudah'],
        'filterWidgetOptions'=>[
            'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Semua'],        
        'editableOptions' => [
            'inputType'=>'dropDownList',
            'data' => [0 => 'Belum', 1 => 'Sudah'],
            'displayValueConfig'=> [
                1 => '<b style="color:green;"><i class="glyphicon glyphicon-thumbs-up"></i> sudah</b>',
                0 => '<b style="color:red;"><i class="glyphicon glyphicon-thumbs-down"></i> belum</b>',
            ],
        ]
    ],

    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'IS_VALIDATED',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>[0 => 'Belum', 1 => 'Sudah'],
        'filterWidgetOptions'=>[
            'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Semua'],
        'editableOptions' => [
            'inputType'=>'dropDownList',
            'data' => [0 => 'Belum', 1 => 'Sudah'],
            'displayValueConfig'=> [
                1 => '<b style="color:green;"><i class="glyphicon glyphicon-thumbs-up"></i> sudah</b>',
                0 => '<b style="color:red;"><i class="glyphicon glyphicon-thumbs-down"></i> belum</b>',
            ],
        ]
    ],
    
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'KELOMPOK',

    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'KATEGORI',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>ArrayHelper::map(ValidasiKategori::find()->asArray()->all(), 'kategori_id', 'kategori_id'),
        'filterWidgetOptions'=>[
            'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Semua'],        
        'editableOptions' => [
            'inputType'=>'dropDownList',
            'data' => ArrayHelper::map(ValidasiKategori::find()->asArray()->all(), 'kategori_id', 'kategori_nama'),
            'displayValueConfig'=> ArrayHelper::map(ValidasiKategori::find()->asArray()->all(), 'kategori_id', 'kategori_id'),
        ]
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'MODIFIED',
        'format'=>'datetime',

    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'KD_PROPINSI'=>$model->KD_PROPINSI, 'KD_DATI2'=>$model->KD_DATI2, 'KD_KECAMATAN'=>$model->KD_KECAMATAN, 'KD_KELURAHAN'=>$model->KD_KELURAHAN, 'KD_BLOK'=>$model->KD_BLOK, 'NO_URUT'=>$model->NO_URUT, 'KD_JNS_OP'=>$model->KD_JNS_OP]);
        },
        'template'=>'{view} {delete} {print}',
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
        'buttons' => [
                
                'print' => function($url,$model) {
                     $url = Url::to(['/cetak/validasi','KD_PROPINSI'=>$model->KD_PROPINSI, 'KD_DATI2'=>$model->KD_DATI2, 'KD_KECAMATAN'=>$model->KD_KECAMATAN, 'KD_KELURAHAN'=>$model->KD_KELURAHAN, 'KD_BLOK'=>$model->KD_BLOK, 'NO_URUT'=>$model->NO_URUT, 'KD_JNS_OP'=>$model->KD_JNS_OP]);
                     return Html::a('<span class="glyphicon glyphicon-print"></span>', $url, [
                            'title' => Yii::t('yii', 'Print'),
                            'target'=>'_blank',
                            'data-pjax' => '0',

                        ]); 
                }
        ]
    ],

];   