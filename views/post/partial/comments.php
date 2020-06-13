<?php
use yii\captcha\Captcha;


/** @var \app\models\Post $post */
/** @var \app\models\CommentForm $commentForm */
?>

<div class="comment_area clearfix" id="comments">
    <?php if(!empty($post->comments)): ?>
        <h4 class="title mb-70"> Комментарии</h4>
        <ol>
            <?php foreach ($post->postComments as $comment): ?>
                <?php if ($comment->parent_id === 0): ?>
                    <!-- Single Comment Area -->
                    <li class="single_comment_area">
                        <!-- Comment Content -->
                        <div class="comment-content d-flex">
                            <!-- Comment Author -->
                            <div class="comment-author">
                                <?= \yii\helpers\Html::img("@web/{$comment->user->img}", ['alt' => $comment->user->username]) ?>
                            </div>
                            <!-- Comment Meta -->
                            <div class="comment-meta">
                                <a href="#" class="post-author"><?= $comment->user->username ?></a>
                                <a href="#" class="post-date"><?= $comment->date ?></a>
                                <p><?= $comment->message ?></p>
                            </div>
                        </div>
                        <?php if (!empty($comment->children)): ?>
                            <ol class="children">
                                <?php foreach ($comment->children as $child): ?>
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <?= \yii\helpers\Html::img("@web/{$child->user->img}", ['alt' => $child->user->username]) ?>
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="post-author"><?= $child->user->username ?></a>
                                                <a href="#" class="post-date"><?= $child->date ?></a>
                                                <p><?= $child->message ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ol>
    <?php else: ?>
        <h4 class="title mb-70"> Комментариев нет</h4>
    <?php endif; ?>

</div>
<div class="post-a-comment-area">
    <h4 class="mb-50">Оставить комментарий</h4>

    <!-- Reply Form -->
    <?php if (!Yii::$app->user->isGuest):?>
        <div class="contact-form-area">

            <?php $form = \yii\widgets\ActiveForm::begin([
                'action' => ['post/comment', 'id' => $post->id],
            ]) ?>
            <?= $form->field($commentForm, 'message', [
                'template' => "<div class=\"col-12\">
                                                        {input}
                                                        <div class='col-12'>{error}</div>
                                                   </div>",
            ])->textarea([
                'class' => 'form-control',
                'id' => 'message',
                'cols' => '30',
                'rows' => '10',
                'placeholder' => 'Сообщение',
            ]) ?>
            <?= $form->field($commentForm, 'captcha', [
                'template' => "<div class=\"col-12\">
                                                {input}
                                                <div class='col-12'>{error}</div>
                                           </div>",
            ])->widget(Captcha::class, [
                'captchaAction' => 'comment/captcha',
                'options' => [
                    'placeholder' =>'Введите изображение с картинки',
                ],

            ])->label(false) ?>

            <div class="col-12">
                <?= \yii\helpers\Html::submitButton('Отправить',['class' => 'btn viral-btn mt-15']) ?>
            </div>

            <?php \yii\widgets\ActiveForm::end() ?>

        </div>
    <?php else: ?>
        <div class="contact-form-area">
            <p><button class="btn btn-link p-0" data-toggle="modal" data-target="#exampleModal">Войдите</button>, чтобы иметь возможность оставлять комментарии</p>
        </div>
    <?php endif; ?>

</div>

