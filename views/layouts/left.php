<?php 

use yii\helpers\Html;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img('@web/img/363633-200.png',["class"=>"img-circle", "alt"=>"User Image"]) ?>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->nama_lengkap ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php
        $role = Yii::$app->user->identity->role;

        if($role==10)
        {
            # admin
            $menus = [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [
                        ['label' => 'Menu Admin', 'options' => ['class' => 'header']],
                        ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['site/index']],
                        ['label' => 'Pelayanan', 'icon' => 'user', 'url' => ['pelayanan/index']],
                        ['label' => 'SPOP', 'icon' => 'tree', 'url' => ['spop/index']],
                        ['label' => 'LSPOP', 'icon' => 'building', 'url' => ['dat-op-bangunan/index']],
                        ['label' => 'e-SPPT', 'icon' => 'file', 'url' => ['sppt-e/index']],
                        ['label' => 'Pengguna', 'icon' => 'user', 'url' => ['user/index']],
                        ['label' => 'Tunggakan', 'icon' => 'file', 'url' => ['tunggakan/index']],
                        ['label' => 'Laporan', 'icon' => 'file', 'url' => ['laporan/index']],
                        ['label' => 'Propinsi', 'icon' => 'map', 'url' => ['ref-propinsi/index']],
                        ['label' => 'Kota/Kabupaten', 'icon' => 'map', 'url' => ['ref-dati2/index']],
                        ['label' => 'Kecamatan', 'icon' => 'map', 'url' => ['ref-kecamatan/index']],
                        ['label' => 'Kelurahan', 'icon' => 'map', 'url' => ['ref-kelurahan/index']],
                    ],
                ];
        }
        elseif($role==35)
        {
            # printout tunggakan
            $menus = [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [
                        ['label' => 'Tunggakan', 'icon' => 'file', 'url' => ['tunggakan/index']],
                        ['label' => 'Verifikasi e-SPPT', 'icon' => 'file', 'url' => ['sppt-e/verifikasi']],
                    ],
                ];
        }
        elseif($role==21)
        {
            # pencatat email
            $menus = [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [
                        ['label' => 'Catatan Email', 'icon' => 'file', 'url' => ['pencatatan-email/index']],
                    ],
                ];
        }
            

        ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Admin', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['site/index']],
                    ['label' => 'Pelayanan', 'icon' => 'user', 'url' => ['pelayanan/index']],
                    ['label' => 'SPOP', 'icon' => 'tree', 'url' => ['spop/index']],
                    ['label' => 'LSPOP', 'icon' => 'building', 'url' => ['dat-op-bangunan/index']],
                    ['label' => 'Pengguna', 'icon' => 'user', 'url' => ['user/index']],
                    ['label' => 'Tunggakan', 'icon' => 'file', 'url' => ['tunggakan/index']],
                    ['label' => 'Laporan', 'icon' => 'file', 'url' => ['laporan/index']],
                    ['label' => 'Propinsi', 'icon' => 'map', 'url' => ['ref-propinsi/index']],
                    ['label' => 'Kota/Kabupaten', 'icon' => 'map', 'url' => ['ref-dati2/index']],
                    ['label' => 'Kecamatan', 'icon' => 'map', 'url' => ['ref-kecamatan/index']],
                    ['label' => 'Kelurahan', 'icon' => 'map', 'url' => ['ref-kelurahan/index']],
                    ['label' => 'Peta', 'icon' => 'map', 'url' => 'gispbb'],
                ],
            ]
        ) ?>

    </section>

</aside>
