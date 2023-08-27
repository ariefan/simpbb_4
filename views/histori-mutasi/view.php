<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HistoriMutasi */
?>
<div class="histori-mutasi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_pelayanan',
            'nop_sebelum',
            'nama_sebelum',
            'lt_sebelum',
            'lb_sebelum',
            'pbb_sebelum',
            'nop_sesudah',
            'nama_sesudah',
            'lt_sesudah',
            'lb_sesudah',
            'pbb_sesudah',
            'id',
        ],
    ]) ?>

</div>
