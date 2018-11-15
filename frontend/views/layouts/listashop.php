<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>

    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="icon" href="/img/favicon.png" type="image/png">-->
        <link rel="icon" href="/img/test-icon.png" type="image/png">

        <?= Html::csrfMetaTags() ?>
            <title>
                <?= Html::encode($this->title) ?>
            </title>
            <?php $this->head() ?>
    </head>

    <body>
        <?php $this->beginBody() ?>
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="top_menu row m0">
                <div class="container">
                    <div class="float-right">
                        <ul class="header_social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-vk"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light main_box">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="<?= Url::toRoute(['site/index']) ?>"><img src="/img/test-icon.png" alt="" width="80px"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

                        <!-- расставь ссылки Андрей -->
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item <?php if ($this->params['page']==='main') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['site/index']) ?>">ГЛАВНАЯ</a></li>
                            <li class="nav-item <?php if ($this->params['page']==='cat') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['site/category']) ?>">Выбрать подарок</a></li>
                            <li class="nav-item <?php if ($this->params['page']==='how') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['site/how-is-it-work']) ?>">Как это работает</a></li>
                            <li class="nav-item <?php if ($this->params['page']==='act') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['site/activate']) ?>">АКТИВИРОВАТЬ</a></li>
                            <li class="nav-item <?php if ($this->params['page']==='about') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['site/about']) ?>">Контакты</a></li>
<!--
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Каталог</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="/site/category">Категории каталога</a>
                                            <li class="nav-item"><a class="nav-link" href="#">Данные о продукте</a>
                                                <li class="nav-item"><a class="nav-link" href="#">Корзина продуктов</a>
                                                    <li class="nav-item"><a class="nav-link" href="#">Корзина</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="#">Подтверждение</a></li>
                                    </ul>
                                    </li>
                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Отзывы</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a class="nav-link" href="#">Отзывы</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#">Пожелания</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Страницы</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a class="nav-link" href="#">Войти</a>
                                                <li class="nav-item"><a class="nav-link" href="#">Путь подарка</a>
                                                    <li class="nav-item"><a class="nav-link" href="#">Элементы</a></li>
                                        </ul>
                                        </li>
-->
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="#" class="cart"><i class="lnr lnr lnr-cart"></i></a></li>
                                <li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->


        <?= $content ?>


            <!--================ start footer Area  =================-->
            <!--убрать все лишнее -->

            <footer class="footer-area">
                <div class="container">
                    <!-- <div class="row">
                        <div class="col-lg-3  col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6 class="footer_title">О нас</h6>
                                <p>Мы помогаем создавать больше ярких поводов для ярких поздравлений.</p>
                            </div>
                        </div>
                        <!--<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6 class="footer_title">Наши новости</h6>
                                <p>Будь в курсе наших предложений</p>
                                <div id="mc_embed_signup">
                                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                        <div class="input-group d-flex flex-row">
                                            <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                            <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>-->
                    <!--  <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-widget instafeed">
                                <h6 class="footer_title">Галлерея</h6>
                                <ul class="list instafeed d-flex flex-wrap">
                                    <li><img src="img/instagram/Image-06.jpg" alt=""></li>
                                    <li><img src="img/instagram/Image-05.jpg" alt=""></li>
                                    <li><img src="img/instagram/Image-06.jpg" alt=""></li>
                                    <li><img src="img/instagram/Image-05.jpg" alt=""></li>
                                    <li><img src="img/instagram/Image-06.jpg" alt=""></li>
                                    <li><img src="img/instagram/Image-05.jpg" alt=""></li>
                                    <li><img src="img/instagram/Image-06.jpg" alt=""></li>
                                    <li><img src="img/instagram/Image-05.jpg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="single-footer-widget f_social_wd">
                                <h6 class="footer_title"> Присоединяйтесь к нам в социальных сетях</h6>
                                <p>Мы в социальных сетях</p>
                                <div class="f_social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-vk"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row footer-bottom d-flex justify-content-between align-items-center">
                        <p class="col-lg-12 footer-text text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());

                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
                </div>
            </footer>
            <!--================ End footer Area  =================-->


            <?php $this->endBody() ?>
    </body>

    </html>
    <?php $this->endPage() ?>


