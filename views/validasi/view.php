<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Validasi */
?>
<div class="validasi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KD_PROPINSI',
            'KD_DATI2',
            'KD_KECAMATAN',
            'KD_KELURAHAN',
            'KD_BLOK',
            'NO_URUT',
            'KD_JNS_OP',
            'KETERANGAN:ntext',
            'IS_CETAK',
            'IS_VALIDATED',
            'KELOMPOK',
            'MODIFIED',
        ],
    ]) ?>

</div>
