<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-12">

                    <div class="site-error">

                        <h1><?= Html::encode($this->title) ?></h1>

                        <div class="alert alert-danger">
                            <?= nl2br(Html::encode($message)) ?>
                        </div>

                    </div>

            </div>

        </div>
    </div>
</div>




