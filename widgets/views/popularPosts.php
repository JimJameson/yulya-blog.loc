<?php
    /** @var \app\models\Post[] $popularPosts;
     * @var \yii\web\View $this;
     */
?>

<!-- Single Welcome Slide222 -->
<div class="single-welcome-slide">
    <div class="row no-gutters">
        <div class="col-12 col-lg-8">
            <!-- Welcome Post -->
            <div class="welcome-post welcome-post-1">
                <?= \yii\helpers\Html::img("@web/{$popularPosts[0]->img}", ['alt' => $popularPosts[0]->title]) ?>
                <div class="post-content" data-animation="fadeInUp" data-duration="500ms">
                    <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $popularPosts[0]->category->id]) ?>" class="tag"><?= $popularPosts[0]->category->short_title ?></a>
                    <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $popularPosts[0]->id]) ?>" class="post-title"><?= $popularPosts[0]->title ?></a>
                    <p><?= $popularPosts[0]->date ?></p>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="welcome-posts--">
                <!-- Welcome Post -->
                <div class="welcome-post style-2 welcome-post-2">
                    <?= \yii\helpers\Html::img("@web/{$popularPosts[1]->img}", ['alt' => $popularPosts[1]->title]) ?>
                    <div class="post-content" data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">
                        <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $popularPosts[1]->category->id]) ?>" class="tag tag-2"><?= $popularPosts[1]->category->short_title ?></a>
                        <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $popularPosts[1]->id]) ?>" class="post-title"><?= $popularPosts[1]->title ?></a>
                        <p><?= $popularPosts[1]->date ?></p>
                    </div>
                </div>

                <!-- Welcome Post -->
                <div class="welcome-post style-2 welcome-post-2">
                    <?= \yii\helpers\Html::img("@web/{$popularPosts[2]->img}", ['alt' => $popularPosts[2]->title]) ?>
                    <div class="post-content" data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">
                        <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $popularPosts[2]->category->id]) ?>" class="tag tag-3"><?= $popularPosts[2]->category->short_title ?></a>
                        <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $popularPosts[2]->id]) ?>" class="post-title"><?= $popularPosts[2]->title ?></a>
                        <p><?= $popularPosts[2]->date ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

