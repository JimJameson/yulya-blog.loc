<?php
    /** @var \yii\web\View $this */

    $route = Yii::$app->requestedRoute;

use yii\widgets\Menu; ?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \yii\helpers\Url::home() ?>" class="brand-link" target="_blank">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
            <div class="btn-logout ml-auto">
                <a href="<?= \yii\helpers\Url::to(['auth/logout']) ?>" class="btn btn-block btn-outline-secondary btn-sm">Logout</a>
            </div>
        </div>
        <?php
        $categories = \app\models\Category::find()->where(['parent_id' => 0])->select(['id', 'title as label'])->asArray()->all();
        $categories = array_map(function ($item) {
                    $url = \yii\helpers\Url::to(['category/filter', 'id' => $item['id']]);
                    $item['url'] = $url;
                    return $item;
                }, $categories);

        array_unshift($categories,
            ['label' => 'Все категории', 'url' => \yii\helpers\Url::to(['category/index'])],
            ['label' => 'Новая категория', 'url' => \yii\helpers\Url::to(['category/create'])]
        );
        $categories = array_map(function ($item) {
            $item['template'] = "
                        <a href='{url}' class=\"nav-link\">
                            <i class=\"far fa-circle nav-icon\"></i>
                            <p>{label}</p>
                        </a>";
            $item['option'] = ['class' => 'nav-item'];
            return $item;
        }, $categories);
        ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?= Menu::widget([
                'items' => [
                    [
                        'label' => 'Статистика',
                        'url' => ['main/index'],
                        'template' => "
                                <a href='{url}' class=\"nav-link\">
                                    <i class=\"nav-icon far fa-chart-bar\"></i>
                                    <p>
                                        {label}
                                    </p>
                                </a>
                        ",
                        'options' => ['class' => 'nav-item']
                    ],
                    [
                        'label' => 'Статьи',
                        'template' => "
                                <a href=\"\" class=\"nav-link\">
                                    <i class=\"nav-icon far fa-file-alt\"></i>
                                    <p>
                                        {label}
                                        <i class=\"right fas fa-angle-left\"></i>
                                    </p>
                                </a>
                        ",
                        'options' => ['class' => 'nav-item has-treeview'],
                        'items' => [
                            ['label' => 'Список статей',
                                'url' => ['post/index'],
                                'template' => "
                                       <a href='{url}' class=\"nav-link\">
                                            <i class=\"far fa-circle nav-icon\"></i>
                                            <p>{label}</p>
                                        </a>
                                ",
                                'option' => ['class' => 'nav-item'],
                            ],
                            ['label' => 'Новая статья',
                                'url' => ['post/create'],
                                'template' => "
                                        <a href='{url}' class='nav-link'>
                                            <i class='far fa-circle nav-icon'></i>
                                            <p>{label}</p>
                                        </a>
                                ",
                                'option' => ['class' => 'nav-item'],

                            ],
                        ],
                        'submenuTemplate' => "
                            <ul class='nav nav-treeview'>
                                {items}
                            </ul>
                        ",
                    ],
                    [
                        'label' => 'Категории',
                        'template' => "
                                <a href=\"\" class=\"nav-link\">
                                    <i class=\"nav-icon fas fa-folder\"></i>
                                    <p>
                                        {label}
                                        <i class=\"right fas fa-angle-left\"></i>
                                    </p>
                                </a>
                        ",
                        'options' => ['class' => 'nav-item has-treeview'],
                        'items' => $categories,
                        'submenuTemplate' => "
                            <ul class='nav nav-treeview'>
                                {items}
                            </ul>
                        ",
                    ],

                    [
                        'label' => 'Комментарии',
                        'url' => ['comment/index'],
                        'template' => "
                                <a href='{url}' class=\"nav-link\">
                                    <i class=\"nav-icon fas fa-comments\"></i>
                                    <p>
                                        {label}
                                    </p>
                                </a>
                        ",
                        'options' => ['class' => 'nav-item']
                    ],

                    [
                        'label' => 'Пользователи',
                        'template' => "
                                <a href=\"\" class=\"nav-link\">
                                    <i class=\"nav-icon fas fa-user-plus\"></i>
                                    <p>
                                        {label}
                                        <i class=\"right fas fa-angle-left\"></i>
                                    </p>
                                </a>
                        ",
                        'options' => ['class' => 'nav-item has-treeview'],
                        'items' => [
                            ['label' => 'Список пользователей',
                                'url' => ['user/index'],
                                'template' => "
                                       <a href='{url}' class=\"nav-link\">
                                            <i class=\"far fa-circle nav-icon\"></i>
                                            <p>{label}</p>
                                        </a>
                                ",
                                'option' => ['class' => 'nav-item'],
                            ],
                            ['label' => 'Новый пользователь',
                                'url' => ['user/create'],
                                'template' => "
                                        <a href='{url}' class='nav-link'>
                                            <i class='far fa-circle nav-icon'></i>
                                            <p>{label}</p>
                                        </a>
                                ",
                                'option' => ['class' => 'nav-item'],

                            ],
                        ],
                        'submenuTemplate' => "
                            <ul class='nav nav-treeview'>
                                {items}
                            </ul>
                        ",
                    ],
                    [
                        'label' => 'Обратная связь',
                        'template' => "
                                <a href=\"\" class=\"nav-link\">
                                    <i class=\"nav-icon fas fa-envelope-square\"></i>
                                    <p>
                                        {label}
                                        <i class=\"right fas fa-angle-left\"></i>
                                    </p>
                                </a>
                        ",
                        'options' => ['class' => 'nav-item has-treeview'],
                        'items' => [
                            ['label' => 'Все подписки',
                                'url' => ['subscribe/index'],
                                'template' => "
                                       <a href='{url}' class=\"nav-link\">
                                            <i class=\"far fa-circle nav-icon\"></i>
                                            <p>{label}</p>
                                        </a>
                                ",
                                'option' => ['class' => 'nav-item'],
                            ],
                            ['label' => 'Сообщения с сайта',
                                'url' => ['contact/index'],
                                'template' => "
                                        <a href='{url}' class='nav-link'>
                                            <i class='far fa-circle nav-icon'></i>
                                            <p>{label}</p>
                                        </a>
                                ",
                                'option' => ['class' => 'nav-item'],

                            ],
                        ],
                        'submenuTemplate' => "
                            <ul class='nav nav-treeview'>
                                {items}
                            </ul>
                        ",
                    ],
                ],
                'activateParents' => true,
                'options' => [
                    'class' => 'nav nav-pills nav-sidebar flex-column',
                    'data-widget' => 'treeview',
                    'role' => 'menu',
                    'data-accordion' => 'false'
                ],
                'itemOptions' => ['class' => 'nav-item'],

            ]); ?>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
