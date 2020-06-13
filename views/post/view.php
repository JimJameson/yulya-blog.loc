<?php
/** @var \app\models\Post $post */
/** @var array $relatedPosts */
/** @var \app\models\Post $relatedPost */
/** @var \app\models\CommentForm $commentForm */
/** @var \yii\web\View $this */

use yii\captcha\Captcha; ?>

<!-- ##### Viral News Breadcumb Area Start ##### -->
<div class="viral-news-breadcumb-area section-padding-50">
    <div class="container h-100">
        <div class="row h-100 align-items-center">

            <!-- Breadcumb Area -->
            <div class="col-12 col-md-4">
                <h3><?= $post->title ?></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= $post->category->short_title ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $post->title ?></li>
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

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">

                    <!-- Single Featured Post -->
                    <div class="single-blog-post-details">
                        <div class="post-thumb">
                            <?= \yii\helpers\Html::img("@web/{$post->img}", ['alt' => $post->title]) ?>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-catagory"><?= $post->category->short_title ?></a>
                            <h2 class="post-title"><?= $post->title ?></h2>
                            <div class="post-meta">

                                <!-- Post Details Meta Data -->
                                <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
                                    <!-- Post Author & Date -->
                                    <div class="post-authors-date">
                                        <p class="post-date"><?= $post->date ?></p>
                                    </div>
                                    <!-- View Comments -->
                                    <div class="view-comments">
                                        <p class="views">Просмотров: <?= $post->views ?></p>
                                        <p class="views">Лайков: <?= $post->likes ?></p>
                                        <a href="<?= \yii\helpers\Url::to(['post/view/', 'id' => $post->id, '#' => 'comments']) ?>" class="comments">Комментариев: <?= count($post->postComments) ?></a>
                                    </div>
                                </div>
                                <?= $post->content ?>
                            </div>
                        </div>
                        <!-- Login with Facebook to post comments -->
                        <?php if (!Yii::$app->user->isGuest && !$post->isLiked()): ?>
                        <div class="login-with-facebook my-5">
                            <?php \yii\widgets\Pjax::begin(['enablePushState' => false]) ?>
                            <a href="<?= \yii\helpers\Url::to(['post/like', 'id' => $post->id]) ?>" data-pjax = "1"><i class="fas fa-heart"></i> Мне нравится</a>
                            <?php \yii\widgets\Pjax::end() ?>
<!--                            --><?//= $this->renderAjax('partial/likes_greetings'); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Related Articles Area -->
                    <div class="related-articles-">
                        <h4 class="mb-70">Похожие статьи</h4>

                        <div class="row">
                            <?php if(!empty($relatedPosts)): ?>
                                <?php foreach ($relatedPosts as $relatedPost): ?>
                                <!-- Single Post -->
                                <div class="col-12">
                                <div class="single-blog-post style-3 style-5 d-flex align-items-center mb-50">
                                    <!-- Post Thumb -->
                                    <div class="post-thumb">
                                        <a href="#">
                                            <?= \yii\helpers\Html::img("@web/{$relatedPost->img}", ['alt' => $relatedPost->title]) ?>
                                        </a>
                                    </div>
                                    <!-- Post Data -->
                                    <div class="post-data">
                                        <a href="#" class="post-catagory"><?= $relatedPost->category->short_title ?></a>
                                        <a href="#" class="post-title">
                                            <h6><?= $relatedPost->title ?></h6>
                                        </a>
                                        <div class="post-meta">
                                            <p class="post-date"><?= $relatedPost->date ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                        <!-- Comment Area Start -->
                    <?= $this->render('partial/comments', [
                            'post' => $post,
                            'commentForm' => $commentForm,
                    ]) ?>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="blog-sidebar-area">

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
<!-- ##### Blog Area End ##### -->
