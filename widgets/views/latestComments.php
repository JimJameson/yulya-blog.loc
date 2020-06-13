<?php
/** @var \yii\web\View $this
 * @var \app\models\Comment[] $latestComments
 * @var \app\models\Comment $comment
 */
?>
<?php if (isset($latestComments)): ?>
<div class="latest-comments-widget">
    <h4>Последние комментарии</h4>

    <?php foreach ($latestComments as $comment): ?>
    <!-- Single Comment Widget -->
    <div class="single-comments d-flex">
        <div class="comments-thumbnail">
            <?= \yii\helpers\Html::img("@web/{$comment->user->img}", ['alt' => $comment->user->username]) ?>
        </div>
        <div class="comments-text">
            <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $comment->post_id]) ?>>">
                <span><?= $comment->user->username ?></span> в статье <span><?= $comment->post->title ?></span>
            </a>
            <p class="comment-message mb-15"><?= $comment->message ?></p>
            <p class="comment-date"><?= $comment->date ?></p>
        </div>
    </div>
    <?php endforeach; ?>

</div>
<?php endif; ?>
