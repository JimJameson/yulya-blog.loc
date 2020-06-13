<?php
/** @var \yii\web\View $this
 * @var \app\models\Post[] $latestPosts
 * @var \app\models\Post $post
 */
?>
<?php if (isset($latestPosts)): ?>
<div class="col-12 col-md-6 col-lg-4">
    <div class="footer-widget-area">
        <!-- Widget Title -->
        <h4 class="widget-title">Свежие статьи</h4>

        <?php foreach ($latestPosts as $post): ?>
        <!-- Single Latest Post -->
        <div class="single-blog-post style-2 d-flex align-items-center">
            <div class="post-thumb latest-post-footer">
                <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>">
                    <?= \yii\helpers\Html::img("@web/{$post->img}", ['alt' => $post->title]) ?>
                </a>
            </div>
            <div class="post-data">
                <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>" class="post-title">
                    <h6><?= $post->title ?></h6>
                </a>
                <div class="post-meta">
                    <p class="post-date">
                        <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><?= $post->date ?></a>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
