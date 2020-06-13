<?php
/** @var \yii\web\View $this */
/** @var \app\models\Category $category */
/** @var array $posts */
/** @var \app\models\Post $post */
/** @var \app\models\Post $firstPost */
/** @var \yii\data\Pagination $pages */

?>

<!-- ##### Viral News Breadcumb Area Start ##### -->
<div class="viral-news-breadcumb-area section-padding-50">
    <div class="container h-100">
        <div class="row h-100 align-items-center">

            <!-- Breadcumb Area -->
            <div class="col-12 col-md-4">
                <h3><?= $category->title ?></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::home() ?>">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $category->title ?></li>
                    </ol>
                </nav>
            </div>

            <!-- Add Widget -->
            <div class="col-12 col-md-8">
                <div class="add-widget">
                    <a href="#"><img src="img/bg-img/add2.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Viral News Breadcumb Area End ##### -->

<!-- ##### Blog Post Area Start ##### -->
<div class="viral-story-blog-post section-padding-0-50">
<?php if(!empty($firstPost)): ?>
    <!-- Catagory Featured Post -->
    <div class="catagory-featured-post section-padding-100">
        <div class="container">
            <div class="row">
                <!-- Catagory Thumbnail -->
                <div class="col-12 col-md-7">
                    <div class="cata-thumbnail">
                        <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $firstPost->id]) ?>">
                            <?= \yii\helpers\Html::img("@web/{$firstPost->img}", ['alt' => $firstPost->title]) ?>
                    </div>
                </div>
                <!-- Catagory Content -->
                <div class="col-12 col-md-5">
                    <div class="cata-content">
                        <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $firstPost->category->id]) ?>" class="post-catagory">
                            <?= $firstPost->category->short_title ?>
                        </a>
                        <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $firstPost->id]) ?>">
                            <h2><?= $firstPost->title ?></h2>
                        </a>
                        <div class="post-meta">
                            <p class="post-author">By <a href="#">Michael Smithson</a></p>
                            <p class="post-date"><?= $firstPost->updated_at ?></p>
                        </div>
                        <p class="post-excerp">
                            <?= mb_strimwidth( Yii::$app->formatter->asHtml($firstPost->content), 0, 400, '...') ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
    <div class="container">
        <div class="row">
            <!-- Blog Posts Area -->
            <div class="col-12 col-lg-8">
                <div class="row">
                    <?php foreach ($posts as $id=>$post): ?>
                        <?php if($id == 0) {
                            continue;
                        } ?>

                        <!-- Single Blog Post -->
                    <div class="col-12 col-lg-6">
                        <div class="single-blog-post style-3">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>">
                                    <?= \yii\helpers\Html::img("@web/{$post->img}", ['alt' => $post->title]) ?>
                                </a>
                            </div>
                            <!-- Post Data -->
                            <div class="post-data">
                                <?= \yii\helpers\Html::a($post->category->title,
                                    ['category/view', 'id' => $post->category->id],
                                    ['class' => 'post-catagory']
                                    ) ?>
                                <?= \yii\helpers\Html::a("<h6>{$post->title}</h6>",
                                    ['post/view', 'id' => $post->id],
                                    ['class' => 'post-title']
                                    )  ?>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                    <p class="post-date"><?= $post->updated_at ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="viral-news-pagination">
                            <nav aria-label="Page navigation example">
                                <?= \yii\widgets\LinkPager::widget([
                                        'pagination' => $pages,
                                    'pageCssClass' => 'page-item',
                                    'linkOptions' => ['class' => 'page-link page-link-num'],
                                    'prevPageLabel' => 'Назад',
                                    'nextPageLabel' => 'Вперед',
                                    'prevPageCssClass' => 'page-item',
                                    'nextPageCssClass' => 'page-item',
                                    'disabledPageCssClass' => 'page-item',
                                    'disabledListItemSubTagOptions' => ['class' => 'page-link'],
                                ]) ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Area -->
            <div class="col-12 col-lg-4">
                <div class="sidebar-area">

                    <!-- Newsletter Widget -->
                    <?= \app\widgets\SubscribeWidget::widget() ?>


                    <!-- Trending Articles Widget -->
                    <div class="treading-articles-widget mb-70 mt-70">
                        <h4>Trending Articles</h4>

                        <!-- Single Trending Articles -->
                        <div class="single-blog-post style-4">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/15.jpg" alt=""></a>
                                <span class="serial-number">01.</span>
                            </div>
                            <!-- Post Data -->
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>This Is How Notebooks Of An Artist Who Travels Around The World Look</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Trending Articles -->
                        <div class="single-blog-post style-4">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/16.jpg" alt=""></a>
                                <span class="serial-number">02.</span>
                            </div>
                            <!-- Post Data -->
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>Artist Recreates People’s Childhood Memories With Realistic Dioramas</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Trending Articles -->
                        <div class="single-blog-post style-4">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/17.jpg" alt=""></a>
                                <span class="serial-number">03.</span>
                            </div>
                            <!-- Post Data -->
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>Artist Recreates People’s Childhood Memories With Realistic Dioramas</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Add Widget -->
                    <div class="add-widget mb-70">
                        <a href="#"><img src="img/bg-img/add.png" alt=""></a>
                    </div>

                    <!-- Latest Comments -->
                    <?= \app\widgets\LatestCommentsWidget::widget() ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Post Area End ##### -->

