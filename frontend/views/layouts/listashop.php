<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerJsFile('/js/layout.js');

$cities = $this->params['cities'];
$citycpu = $this->params['citycpu'];
$curentcity = $this->params['city'];

//vd($curentcity);
?>

<style>

    #logo-img {
        width:120px;
    }
    .icon-link {
        padding-top: 15px;
    }

@media only screen and (max-width: 800px) {
    #logo-img {
        width:70px;
    }
}

</style>

    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="icon" href="/img/favicon.png" type="image/png">-->
        <link rel="icon" href="/img/logo.png" type="image/png">

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
                        <a class="navbar-brand logo_h" href="<?= Url::toRoute(['site/index']) ?>"><img id="logo-img" src="/img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item" style ="margin-top:18px;">
                                <select id='citieslist' name='city'>
                                    <?php foreach ($cities as $city): ?>
                                        <option 
                                            <?php if ($curentcity == $city->id) echo "selected"; ?>
                                        value ="<?= $city->id ?>"><?= $city->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </li>
                            <li class="nav-item <?php if ($this->params['page']==='main') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['site/index']) ?>">ГЛАВНАЯ</a></li>
                            <li class="nav-item <?php if ($this->params['page']==='cat') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['/site/category', 'city'=>$citycpu, 'fcats' => '_']) ?>">Подарки</a></li>
                            <li class="nav-item <?php if ($this->params['page']==='how') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['site/how-does-it-work']) ?>">Как это работает</a></li>
                            <li class="nav-item <?php if ($this->params['page']==='act') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['site/activate']) ?>">АКТИВИРОВАТЬ</a></li>
                            <li class="nav-item <?php if ($this->params['page']==='about') echo "active" ?>"><a class="nav-link" href="<?= Url::toRoute(['site/about']) ?>">Контакты</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="<?= Url::toRoute(['site/favorite']) ?>" class="cart"><i class="lnr lnr lnr-heart"></i></a></li>
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
            <!--================ End footer Area  =================-->


            <?php $this->endBody() ?>
    </body>

    </html>
    <?php $this->endPage() ?>


