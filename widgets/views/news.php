<?php
/** @var \app\models\Post[] $news
 * @var \app\models\Post $item
 * @var \yii\web\View $this
 */
?>
<?php if (!empty($news)):  ?>
<div class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero-slides owl-carousel">
                    <!-- Single Blog Post -->
                    <?php foreach ($news as $item): ?>
                    <div class="single-blog-post d-flex align-items-center mb-50">
                        <div class="post-thumb">
                            <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $item->id]) ?>">
                                <?= \yii\helpers\Html::img("@web/{$item->img}", ['alt' => $item->title]) ?>
                            </a>
                        </div>
                        <div class="post-data">
                            <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $item->id]) ?>" class="post-title">
                                <h6><?= $item->title ?></h6>
                            </a>
                            <div class="post-meta">
                                <p class="post-date"><a href="#"><?= $item->date ?></a></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
