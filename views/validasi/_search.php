<?php

use yii\helpers\Html;
use kartik\field\FieldRange;
use kartik\form\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\PelayananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelayanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="form-group">
        <?= 
        FieldRange::widget([
            'model' => $model,
            'label' => 'Range PBB',
            'attribute1' => 'pbb_min',
            'attribute2' => 'pbb_max',
            'type' => FieldRange::INPUT_TEXT,
        ]);
        ?>
    </div>

    <?php
    echo $form->field($model, 'IS_VALIDATED')->dropdownList([
            '1' => 'SUDAH', 
            '0' => 'BELUM'
        ],
        ['prompt'=>'Pilih Validasi']
    );

    ?>

    <?php
    echo $form->field($model, 'JENIS')->dropdownList([
            'PIUTANG KPP' => 'PIUTANG KPP', 
            'PIUTANG 2013 S/D 2015 TIDAK TERCETAK' => 'PIUTANG 2013 S/D 2015 TIDAK TERCETAK'
        ],
        ['prompt'=>'Pilih Jenis']
    );

    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
