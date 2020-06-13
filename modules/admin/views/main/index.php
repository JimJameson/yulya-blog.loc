<?php
/** @var \yii\web\View $this
 * @var int $posts
 * @var int $comments
 * @var int $users
 * @var int $categories
 */

$this->title = 'Статистика блога';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $posts ?></h3>

                            <p>Статей</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-file-alt"></i>
                        </div>
                        <a href="<?= \yii\helpers\Url::to(['post/index']) ?>" class="small-box-footer">
                            Подробнее <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $categories ?></h3>

                            <p>Категорий</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-folder"></i>
                        </div>
                        <a href="<?= \yii\helpers\Url::to(['category/index']) ?>" class="small-box-footer">
                            Подробнее <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $comments ?></h3>

                            <p>Комментариев</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <a href="<?= \yii\helpers\Url::to(['comment/index']) ?>" class="small-box-footer">
                            Подробнее <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $users ?></h3>

                            <p>Пользователей</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="<?= \yii\helpers\Url::to(['user/index']) ?>" class="small-box-footer">
                            Подробнее <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
    </div><!-- /.container-fluid -->
</div>

