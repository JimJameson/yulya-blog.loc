<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <base href="/">
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Favicon -->
<!--    <link rel="icon" href="img/core-img/favicon.ico">-->

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between flex-wrap pb-1">
<!--                         Breaking News Area -->
                        <div class="top-breaking-news-area">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                                    <li><a href="#">Welcome to Colorlib Family.</a></li>
                                    <li><a href="#">Nam eu metus sitsit amet, consec!</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mr-15 d-flex">
                            <form class="header-search-form" id="search" action="<?= \yii\helpers\Url::to(['category/search']) ?>" method="get">
                                <input type="text" name="search" placeholder="Поиск...">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                            <?php if (Yii::$app->user->isGuest): ?>
                                <button type="button" class="btn add-post-btn ml-15" data-toggle="modal" data-target="#exampleModal">
                                    Войти
                                </button>
                            <?php else: ?>
                                <a href="<?= \yii\helpers\Url::to(['auth/logout']) ?>" type="button" class="btn add-post-btn ml-15">
                                    Выйти
                                </a>
                            <?php endif; ?>
                        </div>


                        <!-- Social Info Area-->
<!--                        <div class="top-social-info-area">-->
<!--                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>-->
<!--                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>-->
<!--                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>-->
<!--                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="viral-news-main-menu" id="stickyMenu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="viralnewsNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="<?= \yii\helpers\Url::home() ?>">
                        <?= Html::img('@web/img/core-img/logo.png', ['alt' => 'Logo']) ?>
                    </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <?= \app\widgets\MainMenuWidget::widget() ?>
                        </div>
                        <!-- Nav End -->
                    </div>

                </nav>

            </div>
        </div>
    </div>

</header>
<!-- ##### Header Area End ##### -->
<!--Alers Message -->
<div class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?=  \app\widgets\AlertWidget::widget() ?>
            </div>
        </div>
    </div>
</div>

<?= $content ?>
<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">

    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer-widget-area">
                        <!-- Footer Logo -->
                        <div class="footer-logo">
                            <a href="index.html"><img src="/img/core-img/logo.png" alt=""></a>
                        </div>
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                            <ul>
                                <li class="active"><a href="#">Top 10</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Funny</a></li>
                                <li><a href="#">Advertising</a></li>
                                <li><a href="#">Celebs</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Videos</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Submit a video</a></li>
                                <li><a href="#">Don’tMiss</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Newsletter Widget -->
                    <?= \app\widgets\SubscribeWidget::widget() ?>
                </div>

                <!-- Footer Widget Area -->
                <?= \app\widgets\LatestPostWidget::widget() ?>
            </div>
        </div>
    </div>

    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Copywrite -->
                    <p><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->

<!-- Modal Login -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вход на сайт</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= \app\widgets\LoginWidget::widget() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary reg-btn-modal">
                    Регистрация
                </button>
            </div>


        </div>
    </div>
</div>
<!-- Modal Signup -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= \app\widgets\SignupWidget::widget() ?>
            </div>
        </div>
    </div>
</div>

<?= \app\widgets\ContactWidget::widget()?>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
