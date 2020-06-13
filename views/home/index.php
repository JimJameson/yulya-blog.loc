<?php
    /** @var \yii\web\View $this */
    /** @var \app\models\Post $post1 */
    /** @var array $posts */
/** @var \yii\data\Pagination $pages */
?>

<!-- ##### Hero Area Start ##### -->
<?= \app\widgets\NewsWidget::widget() ?>
<!-- ##### Hero Area End ##### -->

<!-- ##### Welcome Slide Area Start ##### -->
<div class="welcome-slide-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="welcome-slides owl-carousel">

                    <?= \app\widgets\PopularPostsWidget::widget() ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Welcome Slide Area End ##### -->

<!-- ##### Blog Post Area Start ##### -->
<div class="viral-story-blog-post section-padding-0-50">
    <div class="container">
        <div class="row">
            <!-- Blog Posts Area -->
            <div class="col-12 col-lg-8">
                <div class="row">

                    <?php foreach ($posts as $post1): ?>
                    <!-- Single Blog Post -->
                    <div class="col-12 col-lg-6">
                        <div class="single-blog-post style-3">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a class="post-link" href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post1->id]) ?>">
                                    <?= \yii\helpers\Html::img("@web/{$post1->img}", ['alt' => $post1->title]) ?>
                                </a>
                            </div>
                            <!-- Post Data -->
                            <div class="post-data">
                                <?= \yii\helpers\Html::a($post1->category->short_title,
                                    ['category/view', 'id' => $post1->category->id],
                                        ['class' => 'post-catagory']) ?>
                                <?= \yii\helpers\Html::a("<h6>{$post1->title}</h6>",
                                    ['post/view', 'id' => $post1->id],
                                    ['class' => 'post-title']) ?>
                                <div class="post-meta">
                                    <p class="post-date"><?= $post1->date ?></p>
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

                    <div class="tag-cloud-widget mb-70 mt-70">
                        <?= \app\widgets\TagCloudWidget::widget() ?>
                    </div>

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

