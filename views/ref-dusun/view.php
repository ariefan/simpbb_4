<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefDusun */
?>
<div class="ref-dusun-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KD_PROPINSI',
            'KD_DATI2',
            'KD_KECAMATAN',
            'KD_KELURAHAN',
            'KD_DUSUN',
            'NM_DUSUN',
            'NAMA',
            'JABATAN',
            'NO_TELP',
        ],
    ]) ?>

</div>
