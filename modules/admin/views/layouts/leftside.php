<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
<?= Html::img('/web/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
                <p>Agalor</p>
                <a href="#"><i class="fa fa-circle text-success"></i>В сети</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Поиск...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Меню админки', 'options' => ['class' => 'header']],
                        ['label' => 'Главная', 'icon' => 'fa fa-dashboard',
                            'url' => ['/'], 'active' => $this->context->route == 'site/index'
                        ],
                        [
                            'label' => 'Админка',
                            'icon' => 'fa fa-database',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => 'Продукты',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=master1/',
				    'active' => $this->context->route == '/admin/product'
                                ],
                                [
                                    'label' => 'Категории',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=master2/',
				    'active' => $this->context->route == '/admin/category'
                                ]
                            ]
                        ],
                        ['label' => 'Продукты', 'icon' => 'fa fa-file-code-o', 'url' => ['/admin/product'],],
                        ['label' => 'Категории', 'icon' => 'fa fa-dashboard', 'url' => ['/admin/category'],],
                    ],
                ]
        )
        ?>
        
    </section>
    <!-- /.sidebar -->
</aside>
